<?php

include("conexao.php");

$nome = $_POST['nome'];
$pop = $_POST['pop'];
$area = $_POST['area'];
$clima = $_POST['clima'];
$fundacao = $_POST['fundacao'];
$id_pais = $_POST['id_pais'];
$id_gov = $_POST['id_gov'];

$sql = "INSERT INTO tb_cidades

(nome,pop,area,clima,fundacao,id_pais,id_gov)

VALUES

('$nome','$pop','$area','$clima','$fundacao','$id_pais','$id_gov')";

mysqli_query($con,$sql);

header("Location: cidades.php");

?>