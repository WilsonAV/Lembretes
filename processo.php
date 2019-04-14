<?php 
	session_start();



	$mysqli = new mysqli('localhost', 'root', '', 'aula') or die(mysqli_error($mysqli));
	
			$nome = '';
			$dataNascimento = '';
			$email = '';
			$endereco = '';
			$numero = '';
			$bairro = '';
			$cep = '';
			$cidade = '';
			$estado = '';
			$usuario = '';
			$senha = '';
			$atualiza = false;
			$id = 0;




	if (isset($_POST['cadastrar'])) {

		if ($_POST['senha1'] == $_POST['senha2']) {
			
		$nome=$_POST ['nome'];
		$dataNascimento = $_POST['data'];
		$sexo = $_POST['sexo'];
		$email = $_POST['email'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cep = $_POST['cep'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$user = $_POST['usuario'];
		$senha = $_POST['senha1'];

		$mysqli->query ("INSERT INTO usuario (nome, dataNascimento, sexo, email, endereco, numero, bairro, cep, cidade, estado,user, senha) VALUES ('$nome','$dataNascimento','$sexo','$email','$endereco','$numero','$bairro','$cep','$cidade','$estado','$user','$senha')") or die($mysqli->error);

		$_SESSION['mensagem'] = "Cadastro Realizado!";
		$_SESSION['msg'] = "success";

		header("location: login.php");
	}else{
		echo "Senhas não Conferem";
		header("location: cadastro.php");
	}
		
	}

	if (isset($_GET['apagar'])) {
		$id = $_GET['apagar'];
		$mysqli->query("DELETE FROM usuario WHERE id=$id") or die($mysqli->error());

		$_SESSION['mensagem'] = "Cadastro Removido!";
		$_SESSION['msg'] = "danger";

		header("location: Usuarios.php");
	}

	if (isset($_GET['editar'])) {
		$id = $_GET['editar'];

		$resultado = $mysqli->query("SELECT * FROM usuario WHERE id=$id") or die($mysqli->error());
		if ($resultado) {
			$row = $resultado->fetch_array();
			$nome = $row['nome'];
			$dataNascimento = $row['dataNascimento'];
			$email = $row['email'];
			$endereco = $row['endereco'];
			$numero = $row['numero'];
			$bairro = $row['bairro'];
			$cep = $row['cep'];
			$cidade = $row['cidade'];
			$estado = $row['estado'];
			$usuario = $row['user'];
			$senha = $row['senha'];
			$atualiza = true;


		}
	}

	if (isset($_POST['atualizar'])) {
		$id = $_POST['id'];
		$nome=$_POST ['nome'];
		$dataNascimento = $_POST['data'];
		$sexo = $_POST['sexo'];
		$email = $_POST['email'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cep = $_POST['cep'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$user = $_POST['usuario'];
		$senha = $_POST['senha1'];

		$mysqli->query("UPDATE usuario SET nome = '$nome' , dataNascimento = '$dataNascimento', sexo ='$sexo' , email ='$email' , endereco ='$endereco' , numero ='$numero' , bairro ='$bairro', cep ='$cep', cidade = '$cidade', estado ='$estado' ,user ='$user', senha = '$senha' WHERE id=$id") or die($mysqli->error);

		$_SESSION['mensagem'] = "Dados Alterados Com Sucesso";
		$_SESSION['msg'] = "warning";
		header("location: Usuarios.php");
	}

if (isset($_POST['cadastrarU'])) {

		if ($_POST['senha1'] == $_POST['senha2']) {
			
		$nome=$_POST ['nome'];
		$dataNascimento = $_POST['data'];
		$sexo = $_POST['sexo'];
		$email = $_POST['email'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cep = $_POST['cep'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$user = $_POST['usuario'];
		$senha = $_POST['senha1'];

		$mysqli->query ("INSERT INTO usuario (nome, dataNascimento, sexo, email, endereco, numero, bairro, cep, cidade, estado,user, senha) VALUES ('$nome','$dataNascimento','$sexo','$email','$endereco','$numero','$bairro','$cep','$cidade','$estado','$user','$senha')") or die($mysqli->error);

		$_SESSION['mensagem'] = "Cadastro Realizado!";
		$_SESSION['msg'] = "success";

		header("location: Usuarios.php");
	}else{
		echo "Senhas não Conferem";
		header("location: Usuarios.php");
	}
		
	}















 ?>