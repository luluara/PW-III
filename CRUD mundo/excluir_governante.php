<?php

include("conexao.php");

$id=$_GET['id'];

$sql="DELETE FROM tb_governantes WHERE id_gov=$id";

mysqli_query($con,$sql);

header("Location: governantes.php");

?>