```php
<?php

require_once "conexao.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: continentes.php");
    exit;
}

// Verifica se existem países ligados a este continente
$sql = "SELECT COUNT(*) FROM tb_paises WHERE id_continente = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

$total = $stmt->fetchColumn();

if ($total > 0) {
    echo "<script>
        alert('Não é possível excluir este continente porque existem países cadastrados nele.');
        window.location.href = 'continentes.php';
    </script>";
    exit;
}

// Se não houver países, pode excluir
$sql = "DELETE FROM tb_continentes WHERE id_continente = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

header("Location: continentes.php");
exit;

?>
```
