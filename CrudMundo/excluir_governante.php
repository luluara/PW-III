<?php

include("conexao.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: governantes.php");
    exit;
}

// Verifica se o governante está sendo usado em algum país
$sql = "SELECT COUNT(*) FROM tb_paises WHERE id_gov = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$totalPaises = $stmt->fetchColumn();

// Verifica se o governante está sendo usado em alguma cidade
$sql = "SELECT COUNT(*) FROM tb_cidades WHERE id_gov = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$totalCidades = $stmt->fetchColumn();

if ($totalPaises > 0 || $totalCidades > 0) {
    echo "<script>
            alert('Não é possível excluir este governante porque ele está vinculado a um país ou cidade.');
            window.location.href = 'governantes.php';
          </script>";
    exit;
}

// Se não estiver sendo usado, pode excluir
$sql = "DELETE FROM tb_governantes WHERE id_gov = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

header("Location: governantes.php");
exit;

?>