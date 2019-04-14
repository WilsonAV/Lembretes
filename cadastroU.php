<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<?php include_once('processo.php');?>
	<div class="row justify-content-center">
	<form method = "POST" action="processo.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<h1>Cadastro de usuário</h1>
		<div class = "form-group">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" />
		</div>
		<div class = "form-group">
		<label>Data de Nascimento</label>
		<input type="Date" name="data" class="form-control" value="<?php echo $dataNascimento; ?>">
		</div>
		<div class = "form-group">
		<label>Sexo: </label>
		<input type="radio" name="sexo" value="M" checked /> Masculino
		<input type="radio" name="sexo" value="F"/> Feminino
		</div>
		<div class = "form-group">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
		</div>
		<div class = "form-group">
		<label>Endereço</label>
		<input type="text" name="endereco" class="form-control" value="<?php echo $endereco; ?>" required>
		</div>
		<div class = "form-group">
		<label>Numero</label>
		<input type="number" name="numero" class="form-control" value="<?php echo $numero; ?>" required>
		</div>
		<div class = "form-group">
		<label>Bairro</label>
		<input type="text" name="bairro" class="form-control" value="<?php echo $bairro; ?>"required>
		</div>
		<div class = "form-group">
		<label>CEP </label>    
		<input type="number" name="cep" class="form-control" value="<?php echo $cep; ?>" required>
		</div>
		<div class = "form-group">
		<label>Cidade</label>
		<input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>" required>
		</div>
		<div class = "form-group">
		<label>Estado</label>
		<input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>" required>
		</div>
		

	<h2>Dados de Login</h2>
	<div class = "form-group">
	     <label>Usuario </label>
		<input type = "text" name = "usuario" class="form-control" value="<?php echo $usuario; ?>"required/>
		</div>
		<div class = "form-group">
		<label>Digite a Senha </label>
		<input type = "password" name = "senha1" class="form-control" value="<?php echo $senha; ?>" required>
		</div>
		<div class = "form-group">
		<label>Confirme a Senha</label>
		<input type = "password" name = "senha2" class="form-control" required>
		</div>
		<div class = "form-group">
			<button type="submit" class="btn btn-primary" name="cadastrarU">Cadastrar</button>
		</div>		

	</form>
	</div>

</body>
</html>