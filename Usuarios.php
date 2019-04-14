<?php 
	session_start();
		if (!$_SESSION['login'] ) {
			header('Location: login.php');
		}		

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo1.css">

</head>
<body>
		<?php

		if (isset($_SESSION['mensagem'])): ?>
			
		<div class="alert alert-<?=$_SESSION['msg']?>">
			<?php 
				echo $_SESSION['mensagem'];
				unset($_SESSION['mensagem']);

			?>
		</div>
	<?php endif ?>

	

<div class="container">

<?php
	


	$mysqli = new mysqli('localhost', 'root', '', 'aula') or die(mysqli_error($mysqli));

	$result = $mysqli->query("SELECT * FROM usuario") or die($mysqli->error);
	?>
		<div class="justify-content-end">
			<ul class="nav justify-content-end">
				<li class="nav - item"> <h3 class="bv">Bem Vindo , Admin
						 </h3>
				 </li>
			<li class="nav - item" > <a href="cadastroU.php"> <button type="button" class="btn btn-info" id="botao"> Cadastrar</button> </a></li>
			<a href="logout.php"> <button type="button" class="btn btn-danger" id="botao1">Sair</button> </a>
		</div>
		
		<div class="row justify-content-center">

			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Endereço</th>
						<th>Numero</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th colspan="2"> Opções</th>
					</tr>
				</thead>
				<?php 
					while ($row = $result->fetch_assoc()):  ?>
						<tr>
							<td><?php echo $row['nome']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['endereco']; ?></td>
							<td><?php echo $row['numero']; ?></td>
							<td><?php echo $row['bairro']; ?></td>
							<td><?php echo $row['cidade']; ?></td>
							<td><?php echo $row['estado']; ?></td>
							<td>
								<a href="cadastro.php?editar=<?php echo $row['id']; ?>" class = "btn btn-info">Editar</a>
								<a href="processo.php?apagar=<?php echo $row['id']; ?>" class= "btn btn-danger">Deletar</a>
							</td>							

						</tr>
					<?php endwhile; ?>
			</table>
		</div>
	


	<?php

	function pre_r( $array ){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}


  ?>


</div>
<style type="text/css">
	h3{
		width: 962px;
		float: left;
	}

</style>
</body>
</html>
