```php
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


// Pega o ID do país
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: paises.php");
    exit;
}


// Busca os dados do país
$sql = "SELECT * FROM tb_paises WHERE id_pais = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$dados = $stmt->fetch(PDO::FETCH_ASSOC);


// Verifica se o país existe
if (!$dados) {
    header("Location: paises.php");
    exit;
}


// ==============================
// SALVAR ALTERAÇÕES
// ==============================

if (isset($_POST['editar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $pop = $_POST['pop'];
    $area = $_POST['area'];
    $idioma = $_POST['idioma'];
    $clima = $_POST['clima'];
    $reg_pol = $_POST['reg_pol'];
    $moeda = $_POST['moeda'];
    $id_continente = $_POST['id_continente'];
    $id_gov = $_POST['id_gov'];


    $sql = "UPDATE tb_paises SET

                nome = :nome,
                pop = :pop,
                area = :area,
                idioma = :idioma,
                clima = :clima,
                reg_pol = :reg_pol,
                moeda = :moeda,
                id_continente = :id_continente,
                id_gov = :id_gov

            WHERE id_pais = :id";


    $stmt = $pdo->prepare($sql);


    $stmt->execute([

        ':nome' => $nome,
        ':pop' => $pop,
        ':area' => $area,
        ':idioma' => $idioma,
        ':clima' => $clima,
        ':reg_pol' => $reg_pol,
        ':moeda' => $moeda,
        ':id_continente' => $id_continente,
        ':id_gov' => $id_gov,
        ':id' => $id

    ]);


    header("Location: paises.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar País</title>

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

        <h2>Editar País</h2>


        <form method="POST">

            <!-- ID do país -->

            <input
                type="hidden"
                name="id"
                value="<?= $dados['id_pais']; ?>"
            >


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


            <label>Idioma</label>

            <input
                type="text"
                name="idioma"
                value="<?= htmlspecialchars($dados['idioma']); ?>"
                required
            >


            <label>Clima</label>

            <input
                type="text"
                name="clima"
                value="<?= htmlspecialchars($dados['clima']); ?>"
                required
            >


            <label>Regime Político</label>

            <input
                type="text"
                name="reg_pol"
                value="<?= htmlspecialchars($dados['reg_pol']); ?>"
                required
            >


            <label>Moeda</label>

            <input
                type="text"
                name="moeda"
                value="<?= htmlspecialchars($dados['moeda']); ?>"
                required
            >


            <label>Continente</label>

            <select name="id_continente" required>

                <?php

                $sql = "SELECT * FROM tb_continentes ORDER BY nome";

                $res = $pdo->query($sql);

                while ($linha = $res->fetch(PDO::FETCH_ASSOC)) {

                    $selecionado = "";

                    if ($linha['id_continente'] == $dados['id_continente']) {
                        $selecionado = "selected";
                    }

                ?>

                    <option
                        value="<?= $linha['id_continente']; ?>"
                        <?= $selecionado; ?>
                    >

                        <?= htmlspecialchars($linha['nome']); ?>

                    </option>

                <?php
                }

                ?>

            </select>


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


            <br><br>


            <button type="submit" name="editar">
                Salvar Alterações
            </button>

        </form>

    </div>

</div>

</body>

</html>