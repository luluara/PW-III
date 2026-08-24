<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$erro = "";
$username = $_SESSION['usuario']['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirma_senha = $_POST['confirma_senha'] ?? '';

    if (empty($nova_senha) || empty($confirma_senha)) {
        $erro = "Preencha todos os campos.";
    } elseif ($nova_senha !== $confirma_senha) {
        $erro = "As senhas não coincidem.";
    } elseif ($nova_senha === '123456') {
        $erro = "A nova senha precisa ser diferente da senha padrão.";
    } else {
        // Atualiza a senha e define qtd_acesso = 1
        $upd = $pdo->prepare("UPDATE tb_usuario SET password = ?, qtd_acesso = 1 WHERE username = ?");
        $upd->execute([$nova_senha, $username]);

        // Grava log
        $log = $pdo->prepare("INSERT INTO tb_logs (descricao, data_log, username) VALUES (?, CURDATE(), ?)");
        $log->execute(["Troca de senha inicial realizada", $username]);

        unset($_SESSION['troca_obrigatoria']);
        header("Location: index.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiro Acesso - Troca de Senha</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-box { max-width: 450px; margin: 60px auto; }
        .alert-error { background-color: #fff0f1; color: #ad303b; border: 1px solid #edb6ba; padding: 12px; border-radius: 8px; font-size: 14px; margin-bottom: 15px; }
        .alert-info { background-color: #eef8ff; color: #075985; border: 1px solid #c3e2f5; padding: 12px; border-radius: 8px; font-size: 14px; margin-bottom: 15px; }
        .form-group label { font-weight: 600; font-size: 14px; color: #075985; }
        .btn-submit { width: 100%; margin-top: 10px; padding: 12px; font-size: 15px; }
    </style>
</head>
<body>
    <header>
        <h1>Sistema Mundo</h1>
    </header>
    <main class="container login-box">
        <h2>🔑 Primeiro Acesso</h2>
        <div class="alert-info">Este é seu primeiro acesso. Por segurança, redefina sua senha antes de prosseguir.</div>

        <?php if (!empty($erro)): ?>
            <div class="alert-error">⚠️ <?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required>
            </div>
            <div class="form-group">
                <label for="confirma_senha">Confirme a Nova Senha:</label>
                <input type="password" id="confirma_senha" name="confirma_senha" required>
            </div>
            <button type="submit" class="btn-submit">Salvar Nova Senha</button>
        </form>
    </main>
</body>
</html>