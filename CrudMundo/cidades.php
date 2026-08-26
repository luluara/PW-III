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

<div class="container">

<div class="card">

<h2>Cadastrar Cidade</h2>

<form action="salvar_cidade.php" method="POST">

<label>Nome</label>
<input type="text" name="nome" required>

<label>População</label>
<input type="number" name="pop" required>

<label>Área (km²)</label>
<input type="number" name="area" required>

<label>Clima</label>
<input type="text" name="clima" required>

<label>Data de Fundação</label>
<input type="date" name="fundacao" required>

<label>País</label>

<select name="id_pais">

<?php

$sql = "SELECT * FROM tb_paises";
$resultado = mysqli_query($con,$sql);

while($linha = mysqli_fetch_assoc($resultado))
{

?>

<option value="<?= $linha['id_pais']; ?>">

<?= $linha['nome']; ?>

</option>

<?php
}
?>

</select>

<br><br>

<label>Governante</label>

<select name="id_gov">

<?php

$sql = "SELECT * FROM tb_governantes";
$resultado = mysqli_query($con,$sql);

while($linha = mysqli_fetch_assoc($resultado))
{

?>

<option value="<?= $linha['id_gov']; ?>">

<?= $linha['nome']; ?>

</option>

<?php
}
?>

</select>


<button type="submit">Salvar</button>

</form>

</div>

<br>

<div class="card">

<h2>Cidades Cadastradas</h2>

<table>

<tr>

<th>Nome</th>
<th>País</th>
<th>Governante</th>
<th>População</th>
<th>Ações</th>

</tr>

<?php

$sql = "SELECT
tb_cidades.*,
tb_paises.nome AS pais,
tb_governantes.nome AS governante

FROM tb_cidades

INNER JOIN tb_paises
ON tb_cidades.id_pais = tb_paises.id_pais

INNER JOIN tb_governantes
ON tb_cidades.id_gov = tb_governantes.id_gov";

$resultado = mysqli_query($con,$sql);

while($dados = mysqli_fetch_assoc($resultado))
{

?>

<tr>

<td><?= $dados['nome']; ?></td>

<td><?= $dados['pais']; ?></td>

<td><?= $dados['governante']; ?></td>

<td><?= $dados['pop']; ?></td>

<td>

<a class="btnEditar"
href="editar_cidade.php?id=<?= $dados['id_cidade']; ?>">

Editar

</a>

<a class="btnExcluir"
onclick="return confirm('Deseja excluir esta cidade?')"
href="excluir_cidade.php?id=<?= $dados['id_cidade']; ?>">

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