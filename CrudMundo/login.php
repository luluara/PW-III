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
                    <label for="username">E-mail (Usuário):</label>
                    <input type="email"id="username"name="username" placeholder="seuemail@exemplo.com"required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password"id="senha"name="senha"placeholder="Digite sua senha"required>
                </div>

                <div class="login-forgot">

                    <a href="esqueci_senha.php" class="esqueci-senha">
                        Esqueci minha senha
                    </a>

                </div>

                <button type="submit" class="btn-submit"> Entrar no Sistema </button>
            </form>
    </main>
</body>
</html>