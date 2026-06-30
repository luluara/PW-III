<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tb_continentes WHERE id_continente = $id";
$resultado = mysqli_query($con, $sql);
$dados = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Continente</title>

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

<h2>Editar Continente</h2>

<form action="" method="POST">

<input type="hidden" name="id" value="<?php echo $dados['id_continente']; ?>">

<label>Nome</label>
<input type="text" name="nome" value="<?php echo $dados['nome']; ?>" required>

<label>População</label>
<input type="number" name="pop" value="<?php echo $dados['pop']; ?>" required>

<label>Área</label>
<input type="number" name="area" value="<?php echo $dados['area']; ?>" required>

<label>Total de Países</label>
<input type="number" name="total_paises" value="<?php echo $dados['total_paises']; ?>" required>

<button type="submit" name="editar">Salvar Alterações</button>

</form>

</div>

</div>

</body>

</html>

<?php

if(isset($_POST['editar'])){

$id = $_POST['id'];
$nome = $_POST['nome'];
$pop = $_POST['pop'];
$area = $_POST['area'];
$total = $_POST['total_paises'];

$sql = "UPDATE tb_continentes
SET
nome='$nome',
pop='$pop',
area='$area',
total_paises='$total'
WHERE id_continente=$id";

mysqli_query($con,$sql);

header("Location: continentes.php");

}

?>