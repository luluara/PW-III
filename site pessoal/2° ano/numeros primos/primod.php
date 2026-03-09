<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Números Primos</title>
</head>
<body>
    <!-- fundo -->
<style>
body {
    background-image: url(fundo1.jpg);
    background-size: 100%; 
    background-repeat: repeat;}
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: rgba(255, 255, 255, 0.375);
    padding: 25px;
    width: 350px;
    margin: 0 auto;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

</style>

<div align="center"> <!-- para ficar tudo no centro -->
    <h1>✨Digite dez números para verificar se eles são primos ou não✨</h1>
    
    <!-- formulário para envio dos dados -->
    <form method="post">
        <?php
        // criação dos 10 campos para o usuario inserir 
        for ($i = 1; $i <= 10; $i++) {
            echo "<label for='num$i'>Número $i:</label>";
            echo "<input type='number' name='numeros[]' id='num$i' required><br>";
        }
        ?>
        <br><br>
        <button type="submit">Verificar Primos</button> <!-- botão-->
    </form>

    <?php
    // verificação se um número é primo
    function isPrimo($num) {
        if ($num <= 1) return false; // 0 e 1 não são primos
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false; // se for divisível por outro número, não é primo
        }
        return true; // é primo
    }

    // verifica se o formulário foi enviado 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // obtém os números enviados 
        $numeros = $_POST["numeros"] ?? [];
        
        //verificação de cada número enviado
        foreach ($numeros as $numero) {
            $numero = intval($numero); // garante que o valor seja um número inteiro
            
            // verifica se o número é primo e exibe a resposta
            if (isPrimo($numero)) {
                echo "<h3>$numero <strong>é primo</strong> 👍</h3>";
            } else {
                echo "<h3>$numero <strong>não é primo</strong> 👎 </h3>";
            }
        }
    }
    ?>
</div>
</body>
</html>