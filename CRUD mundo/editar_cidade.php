<?php

include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tb_cidades WHERE id_cidade = $id";
$resultado = mysqli_query($con, $sql);
$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST['editar'])){

    $nome = $_POST['nome'];
    $pop = $_POST['pop'];
    $area = $_POST['area'];
    $clima = $_POST['clima'];
    $fundacao = $_POST['fundacao'];
    $id_pais = $_POST['id_pais'];
    $id_gov = $_POST['id_gov'];

    $sql = "UPDATE tb_cidades SET

    nome='$nome',
    pop='$pop',
    area='$area',
    clima='$clima',
    fundacao='$fundacao',
    id_pais='$id_pais',
    id_gov='$id_gov'

    WHERE id_cidade=$id";

    mysqli_query($con,$sql);

    header("Location: cidades.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Editar Cidade</title>

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

<h2>Editar Cidade</h2>

<form method="POST">

<label>Nome</label>
<input type="text" name="nome" value="<?php echo $dados['nome']; ?>" required>

<label>População</label>
<input type="number" name="pop" value="<?php echo $dados['pop']; ?>" required>

<label>Área</label>
<input type="number" name="area" value="<?php echo $dados['area']; ?>" required>

<label>Clima</label>
<input type="text" name="clima" value="<?php echo $dados['clima']; ?>" required>

<label>Data de Fundação</label>
<input type="date" name="fundacao" value="<?php echo $dados['dt_fund']; ?>" required>

<br><br>

<label>País</label>

<select name="id_pais">

<?php

$sql = "SELECT * FROM tb_paises";
$res = mysqli_query($con,$sql);

while($linha=mysqli_fetch_assoc($res))
{

$selecionado = "";

if($linha['id_pais'] == $dados['id_pais'])
{
    $selecionado = "selected";
}

echo "<option value='".$linha['id_pais']."' $selecionado>".$linha['nome']."</option>";

}

?>

</select>

<label>Governante</label>

<select name="id_gov">

<?php

$sql = "SELECT * FROM tb_governantes";
$res = mysqli_query($con,$sql);

while($linha=mysqli_fetch_assoc($res))
{

$selecionado = "";

if($linha['id_gov'] == $dados['id_gov'])
{
    $selecionado = "selected";
}

echo "<option value='".$linha['id_gov']."' $selecionado>".$linha['nome']."</option>";

}

?>

</select>

<button type="submit" name="editar">

Salvar Alterações

</button>

</form>

</div>

</div>

</body>

</html>