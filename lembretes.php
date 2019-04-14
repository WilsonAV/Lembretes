
<?php 
	session_start();
		if (!$_SESSION['login'] ) {
			header('Location: login.php');
		}	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lembretes</title>
	<meta charset="utf-8">

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	

	<?php require_once 'lembretesBD.php';  ?>
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

	$ide= $_SESSION['id'];

	$result = $mysqli->query("SELECT * FROM lembretes where id_user = $ide") or die("$mysqli->error");
	

		?>
		<div class="justify-content-end">
			<ul class="nav justify-content-end">
				<li class="nav - item"> <h3>Bem Vindo ,
				 <?php
						echo ucwords($_SESSION['nome']);					 
				 
						?> </h3>
				 </li>
				<li class="nav - item"> <a href="logout.php"> <button type="button" class="btn btn-danger"> Sair</button> </a></li>
				
			</ul>
			
			
		</div>
				
				<?php 
					while ($row = $result->fetch_assoc()):  ?>
						<form method="POST" action="lembretesBD.php">
						<input type="hidden" name="id" value="<?php echo $ide; ?>">
						<!--<input type="hidden" name="nome" value="<?php echo $nome; ?>">-->
					
							<div class="row justify-content-center">
								<div class="modal-dialog">
         							<div class="modal-content" id="tamanho">
             							<div class="modal-header"id="titulo" >
                				 			<h4 class="modal-title" id="titulo"><?php echo $row['titulo']; ?></h4>
           					  			</div>
            							 <div class="modal-body" id="caixa">
               								  <p id="paragrafo"><?php echo $row['resenha'];?></p>
            							 </div>
            						 <div class="modal-footer">
             								<a class = "lapi" href="cadastroL.php?editar=<?php echo $row['id']; ?>"><img class="lapis" src="lapis.png"></a>
										    <a class="lapi" href="lembretesBD.php?apagar=<?php echo $row['id']; ?>" ><img class="lixeira" src="lixeira.png"></a>
									 </div>              							
								</div>
							</div>

	</div>

					
					</form>
					<?php endwhile; ?>
	<div class="row justify-content-center">
	<form method = "POST" action="lembretesBD.php">
		<input type="hidden" name="id" value="<?php echo $ide; ?>">
		<!--<input type="hidden" name="nome" value="<?php echo $nome; ?>">-->
		<h1>Cadastro de Lembretes</h1>
		<div class = "form-group">
		<label>Titulo</label>
		<input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>" />
		</div>
		<div class = "form-group">
		<label>Resenha</label>
		<textarea type="text" name="resenha" class="form-control" value="<?php echo $resenha; ?>" required></textarea>
		</div>
		<div class = "form-group">
			<?php
				if($atualiza == true):
			 ?>

		<button type="submit" class="btn btn-info" name="atualizar">Atualizar</button>
		<?php else: ?>
			<button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
		<?php endif; ?>
		</div>		

	</form>
	</div>
</div>	

</body>
</html>