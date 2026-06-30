<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bd_mundo";

$con = mysqli_connect($host, $usuario, $senha, $banco);

if(!$con){
    die("Erro ao conectar ao banco.");
}

?>