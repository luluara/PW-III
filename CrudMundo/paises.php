<?php
session_start();

// 1. Impede acesso sem login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// 2. Impede o uso sem redefinir a senha no primeiro acesso
if (isset($_SESSION['troca_obrigatoria']) || (isset($_SESSION['usuario']['qtd_acesso']) && $_SESSION['usuario']['qtd_acesso'] == 0)) {
    header("Location: trocar_senha.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Mundo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
    <div>
        <h1>Sistema Mundo</h1>
        <p>Explore o mundo, um país de cada vez</p>
    </div>
</header>

<nav class="navbar">
    <div class="menu">
        <a href="index.php" class="active"><span>🏠</span> Home</a>
        <a href="continentes.php"><span>🌎</span> Continentes</a>
        <a href="paises.php"><span>🏳️</span> Países</a>

        <!-- Exibe apenas para Administrador ('A') -->
        <?php if (isset($_SESSION['usuario']['tipo']) && $_SESSION['usuario']['tipo'] === 'A'): ?>
            <a href="cidades.php"><span>🏙️</span> Cidades</a>
            <a href="governantes.php"><span>👤</span> Governantes</a>
        <?php endif; ?>

        <a href="logout.php"><span>🚪</span> Sair</a>
    </div>
</nav>

<div class="container">

<div class="card">

<h2>Cadastrar País</h2>

<form action="salvar_pais.php" method="POST">

<label>Nome</label>
<input type="text" name="nome" required>

<label>População</label>
<input type="number" name="pop" required>

<label>Área</label>
<input type="number" name="area" required>

<label>Idioma</label>
<input type="text" name="idioma" required>

<label>Clima</label>
<input type="text" name="clima" required>

<label>Regime Político</label>
<input type="text" name="reg_pol" required>
<br><br>

<label>Moeda</label>
<input type="text" name="moeda" required>

<label>Continente</label>

<select name="id_continente">

<?php

$sql="SELECT * FROM tb_continentes";
$resultado=mysqli_query($con,$sql);

while($linha=mysqli_fetch_assoc($resultado))
{
?>

<option value="<?php echo $linha['id_continente']; ?>">

<?php echo $linha['nome']; ?>

</option>

<?php
}
?>

</select>

<label>Governante</label>

<select name="id_gov" required>

<?php

$sql = "SELECT * FROM tb_governantes";
$resultado = mysqli_query($con, $sql);

while($linha = mysqli_fetch_assoc($resultado)){
?>

<option value="<?php echo $linha['id_gov']; ?>">
    <?php echo $linha['nome']; ?>
</option>

<?php
}
?>

<?php

?>

</select>

<button type="submit">Salvar</button>

</form>

</div>

<br>

<div class="card">

<h2>Países cadastrados</h2>

<table>

<tr>

<th>Nome</th>
<th>Continente</th>
<th>Idioma</th>
<th>Governante</th>
<th>Ações</th>

</tr>

<?php

$sql="SELECT
tb_paises.*,
tb_continentes.nome AS continente,
tb_governantes.nome AS governante

FROM tb_paises

INNER JOIN tb_continentes
ON tb_paises.id_continente=tb_continentes.id_continente

INNER JOIN tb_governantes
ON tb_paises.id_gov=tb_governantes.id_gov";

$resultado=mysqli_query($con,$sql);

while($dados=mysqli_fetch_assoc($resultado))
{

?>

<tr>

<td><?php echo $dados['nome']; ?></td>

<td><?php echo $dados['continente']; ?></td>

<td><?php echo $dados['idioma']; ?></td>

<td><?php echo $dados['governante']; ?></td>

<td>

<a class="btnEditar" href="editar_pais.php?id=<?php echo $dados['id_pais']; ?>">Editar</a>

<a class="btnExcluir"
onclick="return confirm('Deseja excluir?')"
href="excluir_pais.php?id=<?php echo $dados['id_pais']; ?>">

Excluir

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</div>

</body>

</html>