<?php

$turma = $_POST['turma'];
$qtd = $_POST['qtd'];

$nomes = $_POST['nome'];
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$trab = $_POST['trab'];

$totalMedias = 0;
$maiorMedia = -1;
$menorMedia = 999;

$aprovados = 0;
$recuperacao = 0;
$reprovados = 0;

$somaNotas = 0;

echo "<h2>Relatório da Turma: $turma</h2>";

echo "<table border='1'>
<tr>
<th>Nome</th>
<th>Média</th>
<th>Raiz</th>
<th>Diferença</th>
<th>Situação</th>
</tr>";

for($i = 0; $i < $qtd; $i++){

    if($n1[$i] < 0 || $n1[$i] > 10 ||
       $n2[$i] < 0 || $n2[$i] > 10 ||
       $trab[$i] < 0 || $trab[$i] > 10){

        echo "<h3>Erro: As notas devem estar entre 0 e 10.</h3>";
        exit;
    }
}

for($i = 0; $i < $qtd; $i++){

    $media = ($n1[$i] + $n2[$i] + $trab[$i]) / 3;
    $raiz = sqrt($n1[$i] + $n2[$i] + $trab[$i]);

    $maiorNota = max($n1[$i], $n2[$i], $trab[$i]);
    $menorNota = min($n1[$i], $n2[$i], $trab[$i]);
    $dif = abs($maiorNota - $menorNota);

    // Situação
    if($media >= 7){
        $situacao = "Aprovado";
        $aprovados++;
    } elseif($media >= 5){
        $situacao = "Recuperação";
        $recuperacao++;
    } else {
        $situacao = "Reprovado";
        $reprovados++;
    }

    // Estatísticas
    $totalMedias += $media;
    $somaNotas += ($n1[$i] + $n2[$i] + $trab[$i]);

    if($media > $maiorMedia) $maiorMedia = $media;
    if($media < $menorMedia) $menorMedia = $media;

    echo "<tr>
    <td>{$nomes[$i]}</td>
    <td>".number_format($media,2)."</td>
    <td>".number_format($raiz,2)."</td>
    <td>".number_format($dif,2)."</td>
    <td>$situacao</td>
    </tr>";
}

echo "</table>";

// Estatísticas da turma
$mediaTurma = $totalMedias / $qtd;
$percentual = ($aprovados / $qtd) * 100;

echo "<h3>Estatísticas da Turma</h3>";
echo "Média da turma: ".number_format($mediaTurma,2)."<br>";
echo "Maior média: ".number_format($maiorMedia,2)."<br>";
echo "Menor média: ".number_format($menorMedia,2)."<br>";
echo "Aprovados: $aprovados<br>";
echo "Recuperação: $recuperacao<br>";
echo "Reprovados: $reprovados<br>";
echo "Percentual de aprovação: ".number_format($percentual,2)."%<br>";
echo "Soma total das notas: ".number_format($somaNotas,2)."<br>";

// Mensagem automática
if($percentual >= 70){
    echo "<h3>Turma com ótimo desempenho! 🎉</h3>";
} elseif($percentual >= 50){
    echo "<h3>Turma com desempenho razoável.</h3>";
} else {
    echo "<h3>Turma com baixo desempenho.</h3>";
}
?>