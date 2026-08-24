<?php

include("conexao.php");

$nome = $_POST['nome'];
$partido = $_POST['partido'];
$nascimento = $_POST['nascimento'];
$idade = $_POST['idade'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];

$sql = "INSERT INTO tb_governantes
(nome,partido,nascimento,idade,inicio_mandato,fim_mandato)

VALUES
('$nome','$partido','$nascimento','$idade','$inicio','$fim')";

mysqli_query($con,$sql);

header("Location: governantes.php");

?>