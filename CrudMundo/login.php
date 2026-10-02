<?php

session_start();

require_once "conexao.php";

$erro = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $senha = $_POST["senha"];

    // Procura o usuário pelo e-mail
    $sql = "SELECT * FROM tb_usuario WHERE username = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe
    if (!$usuario) {

        $erro = "E-mail ou senha incorretos.";

    } else {

        // Verifica a senha
        if (!password_verify($senha, $usuario["password"])) {

            $erro = "E-mail ou senha incorretos.";

        } else {

            // Verifica se o usuário está bloqueado
            if ($usuario["status"] === "B") {

                $erro = "Seu usuário está bloqueado.";

            } else {

                // =====================================================
                // SALVA O USUÁRIO INTEIRO NA SESSÃO
                // =====================================================
                $_SESSION["usuario"] = $usuario;

                // Verifica se é o primeiro acesso
if (
    isset($usuario["qtd_acesso"]) &&
    (int)$usuario["qtd_acesso"] === 0
) {

    $_SESSION["troca_obrigatoria"] = true;

    header("Location: trocar_senha.php");
    exit;
}

// Se não for primeiro acesso
unset($_SESSION["troca_obrigatoria"]);

header("Location: index.php");
exit;
            }
        }
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

</head>

<body>

<header class="header">

    <div>

        <h1>Sistema Mundo</h1>

        <p>Explore o mundo, um país de cada vez</p>

    </div>

</header>

<main class="container login-box">

    <h2>🔒 Acesso ao Sistema</h2>

    <?php if (!empty($erro)): ?>

        <div class="alert-error">
            ⚠️ <?= htmlspecialchars($erro) ?>
        </div>

    <?php endif; ?>

    <form method="POST">

        <div class="form-group">

            <label for="username">
                E-mail (Usuário):
            </label>

            <input
                type="email"
                id="username"
                name="username"
                placeholder="seuemail@exemplo.com"
                required
            >

        </div>

        <div class="form-group">

            <label for="senha">
                Senha:
            </label>

            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Digite sua senha"
                required
            >

        </div>

        <div class="login-forgot">

            <a href="esqueci_senha.php" class="esqueci-senha">
                Esqueci minha senha
            </a>

        </div>

        <button type="submit" class="btn-submit">
            Entrar no Sistema
        </button>

    </form>

</main>

</body>

</html>

