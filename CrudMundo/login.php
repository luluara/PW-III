<?php
session_start();
require_once 'conexao.php';

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!empty($username) && !empty($senha)) {
        $stmt = $pdo->prepare("SELECT * FROM tb_usuario WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $erro = "Usuário não encontrado.";
        } elseif ($user['status'] === 'B') {
            $erro = "Conta bloqueada. Contate o administrador.";
        } else {
            if ($senha === $user['password']) {
                unset($_SESSION['tentativas'][$username]);

                $_SESSION['usuario'] = [
                    'username' => $user['username'],
                    'nome' => $user['nome'],
                    'tipo' => $user['tipo']
                ];

                $log = $pdo->prepare("INSERT INTO tb_logs (descricao, data_log, username) VALUES (?, CURDATE(), ?)");
                $log->execute(["Login realizado com sucesso", $username]);

                // VERIFICAÇÃO DE PRIMEIRO ACESSO
                if ((int)$user['qtd_acesso'] === 0) {
                    $_SESSION['troca_obrigatoria'] = true;
                    header("Location: trocar_senha.php");
                    exit;
                }

                // Incrementa o acesso se não for o primeiro
                $upd = $pdo->prepare("UPDATE tb_usuario SET qtd_acesso = qtd_acesso + 1 WHERE username = ?");
                $upd->execute([$username]);

                header("Location: index.html");
                exit;
            } else {
                $_SESSION['tentativas'][$username] = ($_SESSION['tentativas'][$username] ?? 0) + 1;
                $tentativas = $_SESSION['tentativas'][$username];

                if ($tentativas >= 3) {
                    $upd = $pdo->prepare("UPDATE tb_usuario SET status = 'B' WHERE username = ?");
                    $upd->execute([$username]);

                    $log = $pdo->prepare("INSERT INTO tb_logs (descricao, data_log, username) VALUES (?, CURDATE(), ?)");
                    $log->execute(["Bloqueio de conta por exceder 3 tentativas incorretas", $username]);

                    $erro = "Conta bloqueada por exceder 3 tentativas incorretas.";
                } else {
                    $log = $pdo->prepare("INSERT INTO tb_logs (descricao, data_log, username) VALUES (?, CURDATE(), ?)");
                    $log->execute(["Tentativa incorreta de senha ($tentativas/3)", $username]);

                    $erro = "Senha incorreta. Tentativa {$tentativas} de 3.";
                }
            }
        }
    } else {
        $erro = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Mundo</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-box { max-width: 450px; margin: 60px auto; }
        .alert-error { background-color: #fff0f1; color: #ad303b; border: 1px solid #edb6ba; padding: 12px; border-radius: 8px; font-size: 14px; font-weight: 500; margin-bottom: 15px; }
        .form-group label { font-weight: 600; font-size: 14px; color: #075985; }
        .btn-submit { width: 100%; margin-top: 10px; padding: 12px; font-size: 15px; }
    </style>
</head>
<body>
    <header>
        <h1>Sistema Mundo</h1>
    </header>
    <main class="container login-box">
        <h2>🔒 Acesso ao Sistema</h2>
        <?php if (!empty($erro)): ?>
            <div class="alert-error">⚠️ <?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">E-mail (Usuário):</label>
                <input type="email" id="username" name="username" placeholder="seuemail@exemplo.com" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn-submit">Entrar no Sistema</button>
        </form>
    </main>
</body>
</html>