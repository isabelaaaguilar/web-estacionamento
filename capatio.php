<?php 
//var_dump($_POST);

if(count($_POST)>0)
{
	//Inserir no Banco de Dados
	$banco= "estacionamento";
	$usuario= "estacionamento";
	$senha= "joselia";

	$conexao = new PDO("mysql:host=localhost;dbname=${banco}", $usuario, $senha);

	$sql = "INSERT INTO Patio VALUES (?, ?, ?)";

	$comando = $conexao->prepare($sql);

	$sucesso = $comando->execute([
		$_POST ['num'],
		$_POST ['ender'],
		$_POST ['capacidade'],
	]);
	$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Patio cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}
	// uso um cookie para passar a mensagem para a página de clientes
	setcookie('mensagem', $mensagem);
	//redireciona para a página de clientes.php
	header('Location: patios.php');
}

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Patios - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="patios.php">Pátios</a></li>
				<li class="ativo"><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Novo Pátio</h2>
			<form action="capatio.php" method="post">
			<p>
				<label for="inum">Número</label>
				<input type="text" name="num" id="inum">				
			</p>
			<p>
				<label for="iender">Endereço</label>
				<input type="text" name="ender" id="iender">				
			</p>
			<p>
				<label for="icap">Capacidade</label>
				<input type="text" name="capacidade" id="icap">				
			</p>
			<p>
				<button type="submit">Salvar</button>
			</p>
			</form>
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>