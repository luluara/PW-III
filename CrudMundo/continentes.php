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

// Conexão com o banco de dados
require_once "conexao.php";
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

        <a href="index.php">
            <span>🏠</span> Home
        </a>

        <a href="continentes.php" class="active">
            <span>🌎</span> Continentes
        </a>

        <a href="paises.php">
            <span>🏳️</span> Países
        </a>

        <!-- Exibe apenas para Administrador -->
        <?php if (isset($_SESSION['usuario']['tipo']) && $_SESSION['usuario']['tipo'] === 'A'): ?>

            <a href="cidades.php">
                <span>🏙️</span> Cidades
            </a>

            <a href="governantes.php">
                <span>👤</span> Governantes
            </a>

        <?php endif; ?>

        <a href="logout.php">
            <span>🚪</span> Sair
        </a>

    </div>
</nav>

<div class="container">

    <!-- FORMULÁRIO DE CADASTRO -->
    <div class="card">

        <h2>Cadastrar Continente</h2>

        <form action="salvar_continente.php" method="POST">

            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>População</label>
            <input type="number" name="pop" required>

            <label>Área (km²)</label>
            <input type="number" name="area" required>

            <label>Total de Países</label>
            <input type="number" name="total_paises" required>

            <button type="submit">Salvar</button>

        </form>

    </div>

    <br>

    <!-- LISTA DE CONTINENTES -->
    <div class="card">

        <h2>Continentes cadastrados</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>População</th>
                <th>Área</th>
                <th>Total Países</th>
                <th>Ações</th>
            </tr>

            <?php

            $sql = "SELECT * FROM tb_continentes";

            $resultado = $pdo->query($sql);

            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {

            ?>

                <tr>

                    <td>
                        <?php echo $linha['id_continente']; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($linha['nome']); ?>
                    </td>

                    <td>
                        <?php echo $linha['pop']; ?>
                    </td>

                    <td>
                        <?php echo $linha['area']; ?>
                    </td>

                    <td>
                        <?php echo $linha['total_paises']; ?>
                    </td>

                    <td>

                        <a
                            class="btnEditar"
                            href="editar_continente.php?id=<?php echo $linha['id_continente']; ?>"
                        >
                            Editar
                        </a>

                        <a
                            class="btnExcluir"
                            href="excluir_continente.php?id=<?php echo $linha['id_continente']; ?>"
                            onclick="return confirm('Deseja excluir este continente?')"
                        >
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php
            }

            ?>

        </table>

    </div>

</div>

</body>

</html>

