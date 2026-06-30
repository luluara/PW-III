<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Países</title>

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

<h2>Cadastrar País</h2>

<form action="salvar_pais.php" method="POST">

<label>Nome</label>
<input type="text" name="nome" required>

<label>População</label>
<input type="number" name="pop" required>

<label>Área</label>
<input type="number" name="area" required>

<label>Idioma</label>
<input type="text" name="idioma" required>

<label>Clima</label>
<input type="text" name="clima" required>

<label>Regime Político</label>
<input type="text" name="reg_pol" required>
<br><br>

<label>Moeda</label>
<input type="text" name="moeda" required>

<label>Continente</label>

<select name="id_continente">

<?php

$sql="SELECT * FROM tb_continentes";
$resultado=mysqli_query($con,$sql);

while($linha=mysqli_fetch_assoc($resultado))
{
?>

<option value="<?php echo $linha['id_continente']; ?>">

<?php echo $linha['nome']; ?>

</option>

<?php
}
?>

</select>

<label>Governante</label>

<select name="id_gov" required>

<?php

$sql = "SELECT * FROM tb_governantes";
$resultado = mysqli_query($con, $sql);

while($linha = mysqli_fetch_assoc($resultado)){
?>

<option value="<?php echo $linha['id_gov']; ?>">
    <?php echo $linha['nome']; ?>
</option>

<?php
}
?>

<?php

?>

</select>

<button type="submit">Salvar</button>

</form>

</div>

<br>

<div class="card">

<h2>Países cadastrados</h2>

<table>

<tr>

<th>Nome</th>
<th>Continente</th>
<th>Idioma</th>
<th>Governante</th>
<th>Ações</th>

</tr>

<?php

$sql="SELECT
tb_paises.*,
tb_continentes.nome AS continente,
tb_governantes.nome AS governante

FROM tb_paises

INNER JOIN tb_continentes
ON tb_paises.id_continente=tb_continentes.id_continente

INNER JOIN tb_governantes
ON tb_paises.id_gov=tb_governantes.id_gov";

$resultado=mysqli_query($con,$sql);

while($dados=mysqli_fetch_assoc($resultado))
{

?>

<tr>

<td><?php echo $dados['nome']; ?></td>

<td><?php echo $dados['continente']; ?></td>

<td><?php echo $dados['idioma']; ?></td>

<td><?php echo $dados['governante']; ?></td>

<td>

<a class="btnEditar" href="editar_pais.php?id=<?php echo $dados['id_pais']; ?>">Editar</a>

<a class="btnExcluir"
onclick="return confirm('Deseja excluir?')"
href="excluir_pais.php?id=<?php echo $dados['id_pais']; ?>">

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