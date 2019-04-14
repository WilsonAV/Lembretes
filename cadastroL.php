<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<?php include_once('lembretesBD.php');?>
	<div class="row justify-content-center">
	<form method = "POST" action="lembretesBD.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<h1>Edição de lembrete</h1>
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
	<style type="text/css">
		body{
        background-color: #e1dddc;
    }
	</style>

</body>
</html>