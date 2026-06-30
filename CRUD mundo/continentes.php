<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Continentes</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>

<h1>Sistema Mundo 🌎</h1>

</header>

<nav>

<div class="menu">
  <a href="index.html">Início</a>
  <a href="continentes.php">Continentes</a>
  <a href="paises.php">Países</a>
  <a href="cidades.php">Cidades</a>
  <a href="governantes.php">Governantes</a>
</div> 

</nav>

<div class="container">

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

$resultado = mysqli_query($con,$sql);

while($linha = mysqli_fetch_assoc($resultado))
{

?>

<tr>

<td><?php echo $linha['id_continente']; ?></td>

<td><?php echo $linha['nome']; ?></td>

<td><?php echo $linha['pop']; ?></td>

<td><?php echo $linha['area']; ?></td>

<td><?php echo $linha['total_paises']; ?></td>

<td>

<a class="btnEditar" href="editar_continente.php?id=<?php echo $linha['id_continente']; ?>">

Editar

</a>

<a class="btnExcluir"
onclick="return confirm('Deseja excluir este continente?')"
href="excluir_continente.php?id=<?php echo $linha['id_continente']; ?>">

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