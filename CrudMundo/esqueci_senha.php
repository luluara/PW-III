<?php
session_start();
require_once 'conexao.php';

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');

    if (empty($username)) {
        $erro = "Digite seu e-mail.";
    } else {

        $stmt = $pdo->prepare("SELECT username, nome, status FROM tb_usuario WHERE username = ?");
        $stmt->execute([$username]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            $erro = "Usuário não encontrado.";
        } elseif ($usuario['status'] === 'B') {
            $erro = "Esta conta está bloqueada. Contate o administrador.";
        } else {
            $_SESSION['recuperacao_usuario'] = $usuario['username'];

            header("Location: redefinir_senha.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci minha senha - Sistema Mundo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Sistema Mundo</h1>
</header>

<main class="container login-box">

    <h2>🔑 Recuperar senha</h2>

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

    <p> Digite o e-mail cadastrado para continuar.</p>

    <form method="POST">

        <div class="form-group">
            <label for="username">E-mail:</label>

            <input type="email"id="username"name="username"placeholder="seuemail@exemplo.com"required >
        </div>

        <button type="submit" class="btn-submit"> Continuar </button>
    </form>
    <br>
    <a href="login.php" class="alterar-senha">
        Voltar para o login
    </a>
</main>
</body>
</html>