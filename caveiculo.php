 <?php 
//var_dump($_POST);

if(count($_POST)>0)
{
	//Inserir no Banco de Dados
	$banco= "estacionamento";
	$usuario= "estacionamento";
	$senha= "joselia";

	$conexao = new PDO("mysql:host=localhost;dbname=${banco}", $usuario, $senha);

	$sql = "INSERT INTO Veiculo VALUES (?, ?, ?, ?)";

	$comando = $conexao->prepare($sql);

	$sucesso = $comando->execute([
		$_POST ['placa'],
		$_POST ['modelo_codmod'],
		$_POST ['cliente_cpf'],
		$_POST ['cor'],
	]);
	$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Veiculo cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}
	// uso um cookie para passar a mensagem para a página de clientes
	setcookie('mensagem', $mensagem);
	//redireciona para a página de clientes.php
	header('Location: veiculos.php');
}
$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");
$sql = "SELECT * FROM Modelo";
$comando = $conexao->query($sql);
$modelos = $comando->fetchAll();

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Veículos - IF Park</title>
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
			<h2>Novo Veículo</h2>
			<form action="caveiculo.php" method="post">
			<p>
				<label for="iplaca">Placa</label>
				<input type="text" name="placa" id="iplaca">				
			</p>
			<p>
				<label for="imodelo_codmod">Modelo</label>
				<!--input type="text" name="modelo_codmod" id="imodelo_codmod"-->		
				<select id="imodelo" name="modelo">

                <?php foreach ($modelos as $m): ?>

                    <option value="<?= $m['codmod'] ?>">
                        <?= $m['desc_2'] ?>
                    </option>

                <?php endforeach; ?>

            	</select>     	
			</p>
			<p>
				<label for="icliente_cpf">CPF do Cliente</label>
				<input type="text" name="cliente_cpf" id="icliente_cpf">				
			</p>
			<p>
				<label for="icor">Cor</label>
				<input type="text" name="cor" id="icor">				
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