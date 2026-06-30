<?php

include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tb_governantes WHERE id_gov=$id";
$resultado = mysqli_query($con,$sql);
$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST['editar'])){

$nome = $_POST['nome'];
$partido = $_POST['partido'];
$dt_nascimento = $_POST['dt_nascimento'];
$idade = $_POST['idade'];
$dt_inicio = $_POST['dt_inicio'];
$dt_fim = $_POST['dt_fim'];

$sql = "UPDATE tb_governantes SET

nome='$nome',
partido='$partido',
dt_nascimento='$dt_nascimento',
idade='$idade',
dt_inicio='$dt_inicio',
dt_fim='$dt_fim'

WHERE id_gov=$id";

mysqli_query($con,$sql);

header("Location: governantes.php");

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Editar Governante</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<header>

<h1>Sistema Mundo 🌎</h1>

</header>

<div class="container">

<div class="card">

<h2>Editar Governante</h2>

<form method="POST">

<label>Nome</label>
<input type="text" name="nome" value="<?= $dados['nome']; ?>" required>

<label>Partido</label>
<input type="text" name="partido" value="<?= $dados['partido']; ?>" required>

<label>Data de Nascimento</label>
<input type="date" name="dt_nascimento" value="<?= $dados['dt_nascimento']; ?>" required>

<label>Idade</label>
<input type="number" name="idade" value="<?= $dados['idade']; ?>" required>

<label>Data de Início</label>
<input type="date" name="dt_inicio" value="<?= $dados['dt_inicio']; ?>" required>

<label>Data de Fim</label>
<input type="date" name="dt_fim" value="<?= $dados['dt_fim']; ?>" required>

<br><br>

<button type="submit" name="editar">

Salvar Alterações

</button>

</form>

</div>

</div>

</body>

</html>