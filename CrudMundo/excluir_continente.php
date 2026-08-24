<?php

include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM tb_continentes WHERE id_continente=$id";

mysqli_query($con,$sql);

header("Location: continentes.php");

?>