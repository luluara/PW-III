<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['recuperacao_usuario'])) {
    header("Location: esqueci_senha.php");
    exit;
}

$username = $_SESSION['recuperacao_usuario'];

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirma_senha = $_POST['confirma_senha'] ?? '';

    if (empty($nova_senha) || empty($confirma_senha)) {

        $erro = "Preencha todos os campos.";

    } elseif ($nova_senha !== $confirma_senha) {

        $erro = "As senhas não coincidem.";

    } else {

        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare(
            "UPDATE tb_usuario 
             SET password = ?, qtd_acesso = qtd_acesso + 1
             WHERE username = ?"
        );

        $stmt->execute([$senha_hash, $username]);

        $log = $pdo->prepare(
            "INSERT INTO tb_logs (descricao, data_log, username)
             VALUES (?, CURDATE(), ?)"
        );

        $log->execute([
            "Senha redefinida pelo usuário",
            $username
        ]);

        unset($_SESSION['recuperacao_usuario']);

        $sucesso = "Senha redefinida com sucesso!";

        header("refresh:2;url=login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir senha - Sistema Mundo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>Sistema Mundo</h1>
</header>

<main class="container login-box">

    <h2>🔐 Nova senha</h2>

    <?php if (!empty($erro)): ?>
        <div class="alert-error">
            ⚠️ <?= htmlspecialchars($erro) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <div class="mensagem sucesso">
            <?= htmlspecialchars($sucesso) ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="form-group">
            <label for="nova_senha">Nova senha:</label>

            <input type="password"id="nova_senha"name="nova_senha"required>
        </div>

        <div class="form-group">
            <label for="confirma_senha">Confirmar nova senha:</label>

            <input type="password"id="confirma_senha" name="confirma_senha"required>
        </div>

        <button type="submit" class="btn-submit">Redefinir senha</button>
    </form>
</main>
</body>
</html>