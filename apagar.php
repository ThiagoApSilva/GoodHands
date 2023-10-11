<?php
	session_start();
	include_once('conexao.php');
	include_once('validacao.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Apagar</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			if(isset($_POST['voltar'])){
				echo('<script>window.location="login.php";</script>');
			}
			if(isset($_POST['apaga'])){
				$apagar = $_POST['ap'];
				$sql = 'DELETE from cadastro where id_usuario ='.$apagar.';';
				$banc = mysqli_query($conexao, $sql);
				$sql2 = 'DELETE from registro_chat where id_criador ='.$apagar.';';
				$banc2 = mysqli_query($conexao, $sql2);
				$sql3 = 'DELETE from denuncia where id_denunciador ='.$apagar.';';
				$banc3 = mysqli_query($conexao, $sql3);
				if($banc){
					unset($_SESSION['id_user']);
					unset($_SESSION['conf']);
					echo('<script>window.alert("Conta deletada com sucesso!");window.location="index.php";</script>');
				}else{
					echo('<script>window.alert("Erro ao deletar conta");</script>');
				}
			}

			if(isset($_POST['apaga_adm'])){
				$apagar = $_POST['ap'];
				$sql = 'DELETE from cadastro where id_usuario ='.$apagar.';';
				$banc = mysqli_query($conexao, $sql);
				if($banc){
					echo('<script>window.alert("Conta deletada com sucesso!");window.location="adm.php";</script>');
				}else{
					echo('<script>window.alert("Erro ao deletar conta");</script>');
				}
			}

			if(isset($_POST['apagar'])){
				$apagar = $_POST['ap'];
		?>
		<section class="container">
			<section class="dados" style="height: 150px; margin-left: auto; margin-right: auto; margin-top: 100px;">
				<h4 align="center" class="text-light">Deseja seja realmente apagar sua conta?</h4>
				<form name="apagar" action="#" method="POST">
					<input type="hidden" name="ap" value="<?php echo($apagar); ?>">
					<div align="center">
						<button type="submit" name="voltar" value="voltar" class="bot">Voltar</button>
						<button type="submit" name="apaga" value="apaga" class="bot">Deletar</button>
					</div>
				</form>
			</section>
		</section>

		<?php
			}else if(isset($_POST['apagar_adm'])){
				$apagar = $_POST['ap'];
				?>
				<section class="container">
					<section class="dados" style="height: 150px; margin-left: auto; margin-right: auto; margin-top: 100px;">
						<h4 align="center" class="text-light">Deseja seja realmente apagar sua conta?</h4>
						<form name="apagar" action="#" method="POST">
							<input type="hidden" name="ap" value="<?php echo($apagar); ?>">
							<div align="center">
								<button type="submit" name="voltar" value="voltar" class="bot">Voltar</button>
								<button type="submit" name="apaga" value="apaga" class="bot">Deletar</button>
							</div>
						</form>
					</section>
				</section>
		<?php
			}
		?>
	</body>
</html>