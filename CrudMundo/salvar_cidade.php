```php
<?php

include("conexao.php");

$nome = $_POST['nome'];
$pop = $_POST['pop'];
$area = $_POST['area'];
$clima = $_POST['clima'];
$dt_fund = $_POST['dt_fund'];
$id_pais = $_POST['id_pais'];
$id_gov = $_POST['id_gov'];

$sql = "INSERT INTO tb_cidades
(nome, pop, area, clima, dt_fund, id_pais, id_gov)
VALUES
(:nome, :pop, :area, :clima, :dt_fund, :id_pais, :id_gov)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':pop' => $pop,
    ':area' => $area,
    ':clima' => $clima,
    ':dt_fund' => $dt_fund,
    ':id_pais' => $id_pais,
    ':id_gov' => $id_gov
]);

header("Location: cidades.php");
exit;

?>
```
