<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Governantes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>Sistema Mundo 🌎</h1>
</header>

<nav class="navbar">

    <div class="menu">

     <a href="index.html">
            <span>🏠</span>
            Home
        </a>

        <a href="continentes.php">
            <span>🌎</span>
            Continentes
        </a>

        <a href="paises.php">
            <span>🏳️</span>
            Países
        </a>

        <a href="cidades.php">
            <span>🏙️</span>
            Cidades
        </a>

        <a href="governantes.php"  class="active">
            <span>👤</span>
            Governantes
        </a>

    </div>

</nav>
    


<div class="container">

<div class="card">

<h2>Cadastrar Governante</h2>

<form action="salvar_governante.php" method="POST">

<label>Nome</label>
<input type="text" name="nome" required>

<label>Partido</label>
<input type="text" name="partido" required>

<label>Data de Nascimento</label>
<input type="date" name="dt_nascimento" required>

<label>Idade</label>
<input type="number" name="idade" required>

<label>Data de Início</label>
<input type="date" name="dt_inicio" required>

<label>Data de Fim</label>
<input type="date" name="dt_fim" required>

<br><br>

<button type="submit">Salvar</button>

</form>

</div>

<br>

<div class="card">

<h2>Governantes Cadastrados</h2>

<table>

<tr>

<th>Nome</th>
<th>Partido</th>
<th>Idade</th>
<th>Início</th>
<th>Fim</th>
<th>Ações</th>

</tr>

<?php

$sql = "SELECT * FROM tb_governantes";

$resultado = mysqli_query($con,$sql);

while($dados = mysqli_fetch_assoc($resultado))
{

?>

<tr>

<td><?= $dados['nome']; ?></td>
<td><?= $dados['partido']; ?></td>
<td><?= $dados['idade']; ?></td>
<td><?= $dados['dt_inicio']; ?></td>
<td><?= $dados['dt_fim']; ?></td>

<td>

<a class="btnEditar"
href="editar_governante.php?id=<?= $dados['id_gov']; ?>">

Editar

</a>

<a class="btnExcluir"
onclick="return confirm('Deseja excluir este governante?')"
href="excluir_governante.php?id=<?= $dados['id_gov']; ?>">

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