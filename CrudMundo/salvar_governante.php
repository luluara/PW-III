<?php

require_once "conexao.php";

$nome = $_POST['nome'] ?? '';
$partido = $_POST['partido'] ?? '';
$nascimento = $_POST['dt_nascimento'] ?? '';
$idade = $_POST['idade'] ?? '';
$inicio = $_POST['dt_inicio'] ?? '';
$fim = $_POST['dt_fim'] ?? '';

$sql = "INSERT INTO tb_governantes
        (nome, partido, dt_nascimento, idade, dt_inicio, dt_fim)
        VALUES
        (:nome, :partido, :dt_nascimento, :idade, :dt_inicio, :dt_fim)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':partido' => $partido,
    ':dt_nascimento' => $nascimento,
    ':idade' => $idade,
    ':dt_inicio' => $inicio,
    ':dt_fim' => $fim
]);

header("Location: governantes.php");
exit;

?>
