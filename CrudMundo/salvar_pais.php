<?php

require_once "conexao.php";

$nome = $_POST['nome'] ?? '';
$pop = $_POST['pop'] ?? '';
$area = $_POST['area'] ?? '';
$idioma = $_POST['idioma'] ?? '';
$clima = $_POST['clima'] ?? '';
$reg_pol = $_POST['reg_pol'] ?? '';
$moeda = $_POST['moeda'] ?? '';
$id_continente = $_POST['id_continente'] ?? '';
$id_gov = $_POST['id_gov'] ?? '';

$sql = "INSERT INTO tb_paises
        (nome, pop, area, idioma, clima, reg_pol, moeda, id_continente, id_gov)
        VALUES
        (:nome, :pop, :area, :idioma, :clima, :reg_pol, :moeda, :id_continente, :id_gov)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':pop' => $pop,
    ':area' => $area,
    ':idioma' => $idioma,
    ':clima' => $clima,
    ':reg_pol' => $reg_pol,
    ':moeda' => $moeda,
    ':id_continente' => $id_continente,
    ':id_gov' => $id_gov
]);

header("Location: paises.php");
exit;

?>
