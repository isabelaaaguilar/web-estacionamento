<?php 
//var_dump($_POST);

if(count($_POST)>0)
{
	//Inserir no Banco de Dados
	$banco= "estacionamento";
	$usuario= "estacionamento";
	$senha= "joselia";

	$conexao = new PDO("mysql:host=localhost;dbname=${banco}", $usuario, $senha);

	$sql = "INSERT INTO Modelo VALUES (?, ?)";

	$comando = $conexao->prepare($sql);

	$sucesso = $comando->execute([
		$_POST ['codmod'],
		$_POST ['desc_2'],
	]);
	$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Modelo cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}
	// uso um cookie para passar a mensagem para a página de clientes
	setcookie('mensagem', $mensagem);
	//redireciona para a página de clientes.php
	header('Location: modelos.php');
}

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Modelos - IF Park</title>
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
			<h2>Novo Modelo</h2>
			<form action="camodelo.php" method="post">
			<p>
				<label for="icod">Código</label>
				<input type="text" name="codmod" id="icod">				
			</p>
			<p>
				<label for="idesc">Descrição</label>
				<input type="text" name="desc_2" id="idesc">				
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