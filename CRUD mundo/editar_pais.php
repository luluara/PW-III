<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tb_paises WHERE id_pais = $id";
$resultado = mysqli_query($con, $sql);
$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST['editar'])){

    $nome = $_POST['nome'];
    $pop = $_POST['pop'];
    $area = $_POST['area'];
    $idioma = $_POST['idioma'];
    $clima = $_POST['clima'];
    $reg_pol = $_POST['reg_pol'];
    $moeda = $_POST['moeda'];
    $id_continente = $_POST['id_continente'];
    $id_gov = $_POST['id_gov'];

    $sql = "UPDATE tb_paises SET
        nome='$nome',
        pop='$pop',
        area='$area',
        idioma='$idioma',
        clima='$clima',
        reg_pol='$reg_pol',
        moeda='$moeda',
        id_continente='$id_continente',
        id_gov='$id_gov'
        WHERE id_pais=$id";

    mysqli_query($con,$sql);

    header("Location: paises.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Editar País</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>
<h1>Sistema Mundo 🌎</h1>
</header>

<nav>

<a href="index.html">Início</a>
<a href="continentes.php">Continentes</a>
<a href="paises.php">Países</a>
<a href="cidades.php">Cidades</a>
<a href="governantes.php">Governantes</a>

</nav>

<div class="container">

<div class="card">

<h2>Editar País</h2>

<form method="POST">

<label>Nome</label>
<input type="text" name="nome" value="<?php echo $dados['nome']; ?>" required>

<label>População</label>
<input type="number" name="pop" value="<?php echo $dados['pop']; ?>" required>

<label>Área</label>
<input type="number" name="area" value="<?php echo $dados['area']; ?>" required>

<label>Idioma</label>
<input type="text" name="idioma" value="<?php echo $dados['idioma']; ?>" required>

<label>Clima</label>
<input type="text" name="clima" value="<?php echo $dados['clima']; ?>" required>

<label>Regime Político</label>
<input type="text" name="reg_pol" value="<?php echo $dados['reg_pol']; ?>" required>

<label>Moeda</label>
<input type="text" name="moeda" value="<?php echo $dados['moeda']; ?>" required>

<label>Continente</label>

<select name="id_continente">

<?php

$sql = "SELECT * FROM tb_continentes";
$res = mysqli_query($con,$sql);

while($linha=mysqli_fetch_assoc($res))
{

$selecionado = "";

if($linha['id_continente']==$dados['id_continente'])
    $selecionado="selected";

echo "<option value='".$linha['id_continente']."' $selecionado>".$linha['nome']."</option>";

}

?>

</select>

<label>Governante</label>

<select name="id_gov">

<?php

$sql="SELECT * FROM tb_governantes";
$res=mysqli_query($con,$sql);

while($linha=mysqli_fetch_assoc($res))
{

$selecionado="";

if($linha['id_gov']==$dados['id_gov'])
    $selecionado="selected";

echo "<option value='".$linha['id_gov']."' $selecionado>".$linha['nome']."</option>";

}

?>

</select>

<br><br>

<button type="submit" name="editar">Salvar Alterações</button>

</form>

</div>

</div>

</body>

</html>