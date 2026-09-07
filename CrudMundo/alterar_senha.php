<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['usuario']['username'];

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $senha_atual = $_POST['senha_atual'] ?? '';
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirma_senha = $_POST['confirma_senha'] ?? '';

    if (empty($senha_atual) || empty($nova_senha) || empty($confirma_senha)) {
        $erro = "Preencha todos os campos.";
    } elseif ($nova_senha !== $confirma_senha) {
        $erro = "A nova senha e a confirmação não coincidem.";
    } else {

        // Busca a senha atual do usuário
        $sql = "SELECT password FROM tb_usuario WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            $erro = "Usuário não encontrado.";
        } else {

            // Verifica se a senha atual está correta
            if (!password_verify($senha_atual, $usuario['password'])) {
                $erro = "A senha atual está incorreta.";
            } else {

                // Cria o hash da nova senha
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                // Atualiza a senha no banco
                $sql = "UPDATE tb_usuario 
                        SET password = ? 
                        WHERE username = ?";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nova_senha_hash, $username]);

                $sucesso = "Senha alterada com sucesso!";
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
    <title>Alterar senha</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Alterar senha🔑</h1>

        <?php if ($erro): ?>
            <div class="mensagem erro">
                <?= htmlspecialchars($erro) ?>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="mensagem sucesso">
                <?= htmlspecialchars($sucesso) ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <label for="senha_atual">Senha atual:</label>
            <input type="password" id="senha_atual"  name="senha_atual" required>

            <label for="nova_senha">Nova senha:</label>
            <input type="password" id="nova_senha" name="nova_senha" required>

            <label for="confirma_senha">Confirmar nova senha:</label>
            <input type="password" id="confirma_senha" name="confirma_senha" required>
            <button type="submit">Alterar senha</button>
        </form>
    </div>
</body>
</html>