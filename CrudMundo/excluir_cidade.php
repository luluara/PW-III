<?php

require_once "conexao.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: cidades.php");
    exit;
}

$sql = "DELETE FROM tb_cidades WHERE id_cidade = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

header("Location: cidades.php");
exit;

?>

