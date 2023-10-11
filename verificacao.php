<?php
	session_start();
	include('conexao.php');
	if(!empty($_POST) && empty($_POST['usuario']) || empty($_POST['senha'])){
		echo('<script>window.alert("Por favor preencha todos os campos!");window.location = "login.php"</script>');
		exit;
	}
		$usuario = $_POST['usuario'];
		$senha=sha1(trim($_POST['senha']));


		$sql = 'select * from cadastro where usuario = "'.$usuario.'" and senha = "'.$senha.'";';
		$resul = mysqli_query($conexao,$sql);
		$conf = mysqli_fetch_array($resul);
		if(mysqli_num_rows($resul)){
			$num=0;
			if($resul){
				$_SESSION['id_user'] = $conf['id_usuario'];
				$_SESSION['categoria'] = $conf['categoria'];
				$_SESSION['conf'] = $conf;
				echo('<script>window.alert("Logado com sucesso!");window.location="index.php"</script>');
			}
						
		}else{
			echo('<script>window.alert("Erro ao logar!");window.location="login.php"</script>');
		}
?>