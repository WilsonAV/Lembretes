<?php 
session_start();
require_once("conexao.php");


	 
if ((isset($_POST['username'])) && (isset($_POST['password']))){
	$usuario = mysqli_real_escape_string($conn, $_POST['username']); 
		$senha = mysqli_real_escape_string($conn, $_POST['password']);


		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuario WHERE user = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_array($resultado_usuario);
		$ide = $resultado['id'];
		$_SESSION['id'] = $ide;
		$_SESSION['nome'] = $resultado['nome'];

	if(isset($resultado)){

			if ($_POST['username'] == "Admin") {
				$_SESSION['login'] = true;

				header("Location: Usuarios.php");
				
			}else{
					$_SESSION['login'] = true;
					$nome = $_SESSION['nome'] = $resultado['nome'];
					header('Location: lembretes.php?nome='.$nome."&id=".$ide);
		}
		
	
} else{
	$_SESSION['loginErro'] = "usuario ou Senha Invalido";
	header('Location: login.php');
}
} else{
	echo "Nao pode haver campos vazios";
}


 ?>