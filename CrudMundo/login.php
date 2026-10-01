```php
<?php

session_start();

require_once "conexao.php";

$erro = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Pega os dados digitados
    $username = trim($_POST["username"]);
    $senha = $_POST["senha"];

    // Procura o usuário no banco
    $sql = "SELECT * FROM tb_usuario WHERE username = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica usuário e senha
    if ($usuario && password_verify($senha, $usuario["password"])) {

        // Verifica se o usuário está bloqueado
        if ($usuario["status"] === "B") {

            $erro = "Seu usuário está bloqueado.";

        } else {

            // Cria as informações da sessão
            $_SESSION["usuario_id"] = $usuario["id_usuario"];
            $_SESSION["usuario"] = $usuario["username"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["tipo"] = $usuario["tipo"];

            // Verifica se é primeiro acesso
            if (
                isset($usuario["troca_obrigatoria"]) &&
                $usuario["troca_obrigatoria"] == 1
            ) {

                header("Location: trocar_senha.php");
                exit;
            }

            // Login realizado
            header("Location: index.php");
            exit;
        }

    } else {

        $erro = "E-mail ou senha incorretos.";

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

    <header>
        <h1>Sistema Mundo</h1>
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
```
