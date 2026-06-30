<?php

include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM tb_cidades WHERE id_cidade=$id";

mysqli_query($con,$sql);

header("Location: cidades.php");

?>