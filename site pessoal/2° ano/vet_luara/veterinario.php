<html>
<head>
<meta charset="utf-8">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libertinus+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">


<style>
    body {
        background-image: url(fundo1.jpg);
        background-size: 100%; 
        background-repeat: repeat; 
        font-family: Libertinus Sans;
    }
    h2 {
        color: #fff;
    }

    h1{
        font-family: Libertinus Sans;;
        color: #A0522D;
    }

    .resposta {
        display: flex;
        background-color: #fff; 
        box-shadow: 20px 20px 8px rgba(0,0,0,0.2);
        padding: 20px;          
        border-radius: 5px;       
        width: 25%;          
        height: 50%;
        margin: 20px auto;         

    }

</style>

<body> 
    
    <h1>Digite as seguintes informações:</h1>


    <form method="POST">
        <h2>
            <br> Dono: <input type="text" name="dono"> <br>
            <br> Espécie: <input type="text" name="especie"> <br>  
            <br> Raça: <input type="text" name="raca"> <br>
            <br> Nome: <input type="text" name="nome"> <br>
            <br> Sexo: 
            <select name="sexo">
            <option value="Fêmea">Fêmea</option>
            <option value="Macho">Macho</option>
            </select> <br>
            <br> Data da Consulta: <input type="date" name="data"> <br> 
            <br> Hora da Consulta: <input type="time" name="hora"> <br> <br> 
            <input type="submit" value="Enviar">
        </h2>
    </form>  

    

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$dono = filter_input(INPUT_POST, 'dono');
$especie = filter_input(INPUT_POST, 'especie');
$raca = filter_input(INPUT_POST, 'raca');
$nome = filter_input(INPUT_POST, 'nome');
$sexo = filter_input(INPUT_POST, 'sexo');
$data = filter_input(INPUT_POST, 'data');
$hora = filter_input(INPUT_POST, 'hora');

echo '<div class="resposta"> ';
echo '<h1>';
echo 'Dados cadastrados:';
echo '<br>';
echo '<br>';
echo "dono: $dono<br>";
echo "Espécie: $especie<br>";
echo "Raça: $raca<br>";
echo "Nome: $nome<br>";
echo "Sexo: $sexo<br>";
echo "Consulta: $data às $hora";
echo "</h1>";
echo "</div>";

}
?>

</body>
</head>
</html>