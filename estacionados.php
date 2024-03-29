<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM Estaciona";
	$resultado = $conexao->query($sql);

	$estacionamento = $resultado->fetchAll();

	/*[
		[
			'cpf'=>'04080660608',
			'nome'=>'Livão',
			'dtNasc'=>'28/11/00'
		],
		[
			'cpf'=>'15107352604',
			'nome'=>'Livinha',
			'dtNasc'=>'14/01/02'
		]
	];*/
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Estacionados - IF Park</title>
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
			<h2>Carros Estacionados</h2>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Cód.</th>
							<th>Pátio</th>
							<th>Placa</th>
							<th>Entrada</th>
							<th>Saída</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($estacionamento as $e): ?>
						<tr>
							<td><?= $e['cod'] ?></td>
							<td><?= $e['patio_num'] ?></td>
							<td><?= $e['veiculo_placa'] ?></td>
							<td><?= $e['dtentrada'] . ' ' . $e['hsentrada'] ?></td>
							<td><?= $e['dtsaida'] . ' ' . $e['hssaida'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

</body>
</html>