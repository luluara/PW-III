<?php

require_once "conexao.php";

$nome = $_POST['nome'] ?? '';
$pop = $_POST['pop'] ?? '';
$area = $_POST['area'] ?? '';
$total = $_POST['total_paises'] ?? '';

$sql = "INSERT INTO tb_continentes
        (nome, pop, area, total_paises)
        VALUES
        (:nome, :pop, :area, :total_paises)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':pop' => $pop,
    ':area' => $area,
    ':total_paises' => $total
]);

header("Location: continentes.php");
exit;

?>
