<?php

require_once "conexao.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: paises.php");
    exit;
}

// Verifica se existem cidades cadastradas neste país
$sql = "SELECT COUNT(*) FROM tb_cidades WHERE id_pais = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

$total = $stmt->fetchColumn();

// Se houver cidades, não permite excluir
if ($total > 0) {
    echo "<script>
        alert('Não é possível excluir este país porque existem cidades cadastradas nele.');
        window.location.href = 'paises.php';
    </script>";
    exit;
}

// Se não houver cidades, exclui o país
$sql = "DELETE FROM tb_paises WHERE id_pais = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

header("Location: paises.php");
exit;

?>
