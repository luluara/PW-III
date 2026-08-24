<?php
include("../crudmundo.php");

$sql = "SELECT * FROM paises";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Países</title>
</head>
<body>

<h1>Lista de Países</h1>

<a href="cadastrar.php">
    <button>Cadastrar País</button>
</a>

<br><br>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Idioma</th>
        <th>Moeda</th>
        <th>Ações</th>
    </tr>

    <?php while($pais = mysqli_fetch_assoc($resultado)){ ?>

    <tr>
        <td><?php echo $pais['id']; ?></td>
        <td><?php echo $pais['nome']; ?></td>
        <td><?php echo $pais['idioma']; ?></td>
        <td><?php echo $pais['moeda']; ?></td>

        <td>
            <a href="editar.php?id=<?php echo $pais['id']; ?>">
                Editar
            </a>

            |

            <a href="excluir.php?id=<?php echo $pais['id']; ?>"
               onclick="return confirm('Deseja excluir este país?')">
                Excluir
            </a>
        </td>
    </tr>

    <?php } ?>

</table>

<br>
<a href="../index.html">Voltar</a>

</body>
</html>