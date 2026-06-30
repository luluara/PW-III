<?php

include("conexao.php");

$id = $_GET['id'];

/*
Se o país possuir cidades,
o banco impedirá a exclusão por causa da Foreign Key.
*/

$sql = "DELETE FROM tb_paises WHERE id_pais=$id";

mysqli_query($con,$sql);

header("Location: paises.php");

?>