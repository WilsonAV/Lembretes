<?php
	$mysqli = new mysqli('localhost', 'root', '', 'aula') or die(mysqli_error($mysqli));
			$titulo = '';
			$resenha = '';
			$atualiza = false;
			$id = 0;
			$ideG =$id; 

	if (isset($_POST['cadastrar'])) {

		$nome = $_POST['nome'];
		$ide = $_POST ['id'];
		$ideG = $ide;
		$titulo=$_POST ['titulo'];
		$resenha=$_POST ['resenha'];


		$mysqli->query ("INSERT INTO lembretes (id_user,titulo, resenha) VALUES ('$ide','$titulo','$resenha')") or die($mysqli->error);

		$_SESSION['mensagem'] = "Cadastro Realizado!";
		$_SESSION['msg'] = "success";

		header('location: lembretes.php');
	}


	if (isset($_GET['editar'])) {
		$id = $_GET['editar'];
		$resultado = $mysqli->query("SELECT * FROM lembretes WHERE id=$id") or die($mysqli->error());
		if ($resultado) {
			$row = $resultado->fetch_array();
			$titulo = $row['titulo'];
			$resenha = $row['resenha'];
			$atualiza = true;

		}
	}


	if (isset($_GET['apagar'])) {
		$id = $_GET['apagar'];
		$mysqli->query("DELETE FROM lembretes WHERE id=$id") or die($mysqli->error());

		$_SESSION['mensagem'] = "Lembrete Removido!";
		$_SESSION['msg'] = "danger";
		header('location: lembretes.php');
	}
	

	if (isset($_GET['buscar'])) {
		$titulo = $_POST['buscar'];
		$mysqli->query("SELECT * FROM lembretes WHERE titulo=$titulo") or die($mysqli->error());

		header('location: lembretes.php');
	}


	if (isset($_POST['atualizar'])) {
		$id = $_POST['id'];
		$titulo=$_POST ['titulo'];
		$resenha = $_POST['resenha'];
		

		$mysqli->query("UPDATE lembretes SET titulo = '$titulo' , resenha = '$resenha' WHERE id=$id") or die($mysqli->error);

		$_SESSION['mensagem'] = "Dados Alterados Com Sucesso";
		$_SESSION['msg'] = "warning";
		#header("location: lembretes.php");
		header('location: lembretes.php');
	}

 ?>