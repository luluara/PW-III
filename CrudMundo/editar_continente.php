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


// Pega o ID do continente
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: continentes.php");
    exit;
}


// Busca os dados do continente
$sql = "SELECT * FROM tb_continentes WHERE id_continente = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

$dados = $stmt->fetch(PDO::FETCH_ASSOC);


// Verifica se o continente existe
if (!$dados) {
    header("Location: continentes.php");
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
    $total = $_POST['total_paises'];

    $sql = "UPDATE tb_continentes
            SET
                nome = :nome,
                pop = :pop,
                area = :area,
                total_paises = :total
            WHERE id_continente = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':pop' => $pop,
        ':area' => $area,
        ':total' => $total,
        ':id' => $id
    ]);

    header("Location: continentes.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Continente</title>

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

        <h2>Editar Continente</h2>

        <form action="" method="POST">

            <input
                type="hidden"
                name="id"
                value="<?= $dados['id_continente']; ?>"
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


            <label>Total de Países</label>

            <input
                type="number"
                name="total_paises"
                value="<?= htmlspecialchars($dados['total_paises']); ?>"
                required
            >


            <button type="submit" name="editar">
                Salvar Alterações
            </button>

        </form>

    </div>

</div>

</body>

</html>
