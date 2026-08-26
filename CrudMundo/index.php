<?php
session_start();

// 1. Impede acesso sem login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// 2. Impede o uso sem redefinir a senha no primeiro acesso
if (isset($_SESSION['troca_obrigatoria']) || (isset($_SESSION['usuario']['qtd_acesso']) && $_SESSION['usuario']['qtd_acesso'] == 0)) {
    header("Location: trocar_senha.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Mundo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
    <div>
        <h1>Sistema Mundo</h1>
        <p>Explore o mundo, um país de cada vez</p>
    </div>
</header>

<nav class="navbar">
    <div class="menu">
        <a href="index.php" class="active"><span>🏠</span> Home</a>
        <a href="continentes.php"><span>🌎</span> Continentes</a>
        <a href="paises.php"><span>🏳️</span> Países</a>

        <!-- Exibe apenas para Administrador ('A') -->
        <?php if (isset($_SESSION['usuario']['tipo']) && $_SESSION['usuario']['tipo'] === 'A'): ?>
            <a href="cidades.php"><span>🏙️</span> Cidades</a>
            <a href="governantes.php"><span>👤</span> Governantes</a>
        <?php endif; ?>

        <a href="logout.php"><span>🚪</span> Sair</a>
    </div>
</nav>

<main class="home">
    <section class="hero">
        <div class="hero-text">
            <span class="tag">🌍 EXPLORANDO O MUNDO</span>
            <h2>
                Descubra o mundo<br>
                <strong>sem sair do lugar.</strong>
            </h2>
            <p>
                Conheça países, continentes, cidades e
                governantes ao redor do mundo.
            </p>
        </div>
        <div class="hero-globe">🌎</div>
    </section>
</main>

</body>
</html>