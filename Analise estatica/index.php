<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="analisecss.css"> 
</head>
<body>

<h2>Cadastro da Turma</h2>

<form method="post" action=""> 
    Nome da Turma: <input type="text" name="turma" required><br><br>
    Quantidade de alunos: <input type="number" name="qtd" required><br><br>

    <input type="submit" name="gerar" value="Gerar Campos">
</form>

<br><br>

<?php
if(isset($_POST['gerar'])){
    $qtd = $_POST['qtd'];
    $turma = $_POST['turma'];

    echo "<form method='post' action='sistema.php'>";
    echo "<input type='hidden' name='turma' value='$turma'>";
    echo "<input type='hidden' name='qtd' value='$qtd'>";

    for($i = 0; $i < $qtd; $i++){
        echo "<h3>Aluno ".($i+1)."</h3>";
        echo "Nome: <input type='text' name='nome[]' required><br>";
        echo "Prova 1: <input type='number' step='0.1' name='n1[]' min='0' max='10' required><br>";
        echo "Prova 2: <input type='number' step='0.1' name='n2[]' min='0' max='10' required><br>";
        echo "Trabalho: <input type='number' step='0.1' name='trab[]' min='0' max='10' required><br><br>";
    }

    echo "<input type='submit' value='Calcular'>";
    echo "</form>";
}
?>

</body>
</html>