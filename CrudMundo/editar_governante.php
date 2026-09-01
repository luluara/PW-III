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


// Pega o ID do governante
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: governantes.php");
    exit;
}


// Busca os dados do governante
$sql = "SELECT * FROM tb_governantes WHERE id_gov = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$dados = $stmt->fetch(PDO::FETCH_ASSOC);


// Verifica se o governante existe
if (!$dados) {
    header("Location: governantes.php");
    exit;
}


// ==============================
// SALVAR ALTERAÇÕES
// ==============================

if (isset($_POST['editar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $partido = $_POST['partido'];
    $dt_nascimento = $_POST['dt_nascimento'];
    $idade = $_POST['idade'];
    $dt_inicio = $_POST['dt_inicio'];
    $dt_fim = $_POST['dt_fim'];


    $sql = "UPDATE tb_governantes SET

                nome = :nome,
                partido = :partido,
                dt_nascimento = :dt_nascimento,
                idade = :idade,
                dt_inicio = :dt_inicio,
                dt_fim = :dt_fim

            WHERE id_gov = :id";


    $stmt = $pdo->prepare($sql);


    $stmt->execute([

        ':nome' => $nome,
        ':partido' => $partido,
        ':dt_nascimento' => $dt_nascimento,
        ':idade' => $idade,
        ':dt_inicio' => $dt_inicio,
        ':dt_fim' => $dt_fim,
        ':id' => $id

    ]);


    header("Location: governantes.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Governante</title>

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

        <h2>Editar Governante</h2>


        <form method="POST">

            <!-- ID do governante -->

            <input
                type="hidden"
                name="id"
                value="<?= $dados['id_gov']; ?>"
            >


            <label>Nome</label>

            <input
                type="text"
                name="nome"
                value="<?= htmlspecialchars($dados['nome']); ?>"
                required
            >


            <label>Partido</label>

            <input
                type="text"
                name="partido"
                value="<?= htmlspecialchars($dados['partido']); ?>"
                required
            >


            <label>Data de Nascimento</label>

            <input
                type="date"
                name="dt_nascimento"
                value="<?= htmlspecialchars($dados['dt_nascimento']); ?>"
                required
            >


            <label>Idade</label>

            <input
                type="number"
                name="idade"
                value="<?= htmlspecialchars($dados['idade']); ?>"
                required
            >


            <label>Data de Início</label>

            <input
                type="date"
                name="dt_inicio"
                value="<?= htmlspecialchars($dados['dt_inicio']); ?>"
                required
            >


            <label>Data de Fim</label>

            <input
                type="date"
                name="dt_fim"
                value="<?= htmlspecialchars($dados['dt_fim']); ?>"
                required
            >


            <br><br>


            <button type="submit" name="editar">

                Salvar Alterações

            </button>

        </form>

    </div>

</div>

</body>

</html>

