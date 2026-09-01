<?php

session_start();

// Impede acesso sem login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Impede o uso sem redefinir a senha no primeiro acesso
if (
    isset($_SESSION['troca_obrigatoria']) ||
    (isset($_SESSION['usuario']['qtd_acesso']) && $_SESSION['usuario']['qtd_acesso'] == 0)
) {
    header("Location: trocar_senha.php");
    exit;
}

// Conexão com o banco
require_once "conexao.php";

// Pega o ID da cidade
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: cidades.php");
    exit;
}

// Busca os dados da cidade
$sql = "SELECT * FROM tb_cidades WHERE id_cidade = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dados) {
    header("Location: cidades.php");
    exit;
}


// ==============================
// SALVAR ALTERAÇÕES
// ==============================

if (isset($_POST['editar'])) {

    $nome = $_POST['nome'];
    $pop = $_POST['pop'];
    $area = $_POST['area'];
    $clima = $_POST['clima'];
    $fundacao = $_POST['fundacao'];
    $id_pais = $_POST['id_pais'];
    $id_gov = $_POST['id_gov'];

    $sql = "UPDATE tb_cidades SET
                nome = :nome,
                pop = :pop,
                area = :area,
                clima = :clima,
                dt_fund = :fundacao,
                id_pais = :id_pais,
                id_gov = :id_gov
            WHERE id_cidade = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':pop' => $pop,
        ':area' => $area,
        ':clima' => $clima,
        ':fundacao' => $fundacao,
        ':id_pais' => $id_pais,
        ':id_gov' => $id_gov,
        ':id' => $id
    ]);

    header("Location: cidades.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Cidade</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="header">

    <div>

        <h1>Sistema Mundo 🌎</h1>

    </div>

</header>


<nav class="navbar">

    <div class="menu">

        <a href="index.php">
            <span>🏠</span> Home
        </a>

        <a href="continentes.php">
            <span>🌎</span> Continentes
        </a>

        <a href="paises.php">
            <span>🏳️</span> Países
        </a>

        <a href="cidades.php">
            <span>🏙️</span> Cidades
        </a>

        <a href="governantes.php">
            <span>👤</span> Governantes
        </a>

        <a href="logout.php">
            <span>🚪</span> Sair
        </a>

    </div>

</nav>


<div class="container">

    <div class="card">

        <h2>Editar Cidade</h2>

        <form method="POST">

            <label>Nome</label>

            <input
                type="text"
                name="nome"
                value="<?= htmlspecialchars($dados['nome']); ?>"
                required
            >


            <label>População</label>

            <input
                type="number"
                name="pop"
                value="<?= htmlspecialchars($dados['pop']); ?>"
                required
            >


            <label>Área</label>

            <input
                type="number"
                name="area"
                value="<?= htmlspecialchars($dados['area']); ?>"
                required
            >


            <label>Clima</label>

            <input
                type="text"
                name="clima"
                value="<?= htmlspecialchars($dados['clima']); ?>"
                required
            >


            <label>Data de Fundação</label>

            <input
                type="date"
                name="fundacao"
                value="<?= htmlspecialchars($dados['dt_fund']); ?>"
                required
            >


            <br><br>


            <!-- PAÍS -->

            <label>País</label>

            <select name="id_pais" required>

                <?php

                $sql = "SELECT * FROM tb_paises ORDER BY nome";

                $res = $pdo->query($sql);

                while ($linha = $res->fetch(PDO::FETCH_ASSOC)) {

                    $selecionado = "";

                    if ($linha['id_pais'] == $dados['id_pais']) {
                        $selecionado = "selected";
                    }

                ?>

                    <option
                        value="<?= $linha['id_pais']; ?>"
                        <?= $selecionado; ?>
                    >

                        <?= htmlspecialchars($linha['nome']); ?>

                    </option>

                <?php
                }

                ?>

            </select>


            <!-- GOVERNANTE -->

            <label>Governante</label>

            <select name="id_gov" required>

                <?php

                $sql = "SELECT * FROM tb_governantes ORDER BY nome";

                $res = $pdo->query($sql);

                while ($linha = $res->fetch(PDO::FETCH_ASSOC)) {

                    $selecionado = "";

                    if ($linha['id_gov'] == $dados['id_gov']) {
                        $selecionado = "selected";
                    }

                ?>

                    <option
                        value="<?= $linha['id_gov']; ?>"
                        <?= $selecionado; ?>
                    >

                        <?= htmlspecialchars($linha['nome']); ?>

                    </option>

                <?php
                }

                ?>

            </select>


            <button type="submit" name="editar">

                Salvar Alterações

            </button>

        </form>

    </div>

</div>

</body>

</html>