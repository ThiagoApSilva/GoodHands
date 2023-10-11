<?php
	session_start();
	include('conexao.php');
	include('validacao.php');
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Mensagens</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		
	</head>
	<body>
		<?php
			include('menu.php');
		
			if(isset($_GET['acessar'])){
				unset($_SESSION['nome_chat']);
				$mod = $_GET['mod'];
				$_SESSION['nome_chat'] = $mod;
				$sql = 'select * from registro_chat where nome_chat like "'.$_SESSION['nome_chat'].'";';
				$banc = mysqli_query($conexao, $sql);
				$res = mysqli_fetch_array($banc);

				$_SESSION['nome_chat'] = $mod;
				$teste = 'select * from registro_chat where id_receptor='.$res['id_receptor'].';';
				$test = mysqli_query($conexao, $teste);
			
				while($resul_teste = mysqli_fetch_array($test)){
					if($_SESSION['nome_chat']==$resul_teste['nome_chat']){
						$_SESSION['id_cuidador'] = $resul_teste['id_receptor'];
					}
				}
			}else if(isset($_GET['mandar_mensagem'])){
				unset($_SESSION['nome_chat']);
				$_SESSION['nome_chat'] = $_GET['mod']; 
			}else{
				if(isset($_POST['conversar'])){
					$id = $_POST['id'];
					$_SESSION['id'] = $id;
					$sql50 = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
					$banc50= mysqli_query($conexao, $sql50);
					$resultado50 = mysqli_fetch_array($banc50);
					$array = array($resultado50['nome'], $id);
					$uni = implode("-", $array);
					$_SESSION['nome_chat'] = $uni;
				}
			}
		?>
		<center>
		<main class="container" style="margin-top: 0px;">

			<table style="display: inline; margin-top: 0px; margin: 20px;">
				<tr>
					<td>
						<?php
							include('informacao.php');
						?>
					</td>
				</tr>
			</table>
			<table style="display: inline; margin-top: 0px;">
				<tr>
					<td>
						<?php
							include('chat.php');
						?>
					</td>
				</tr>
			</table>
			<?php
				if($_SESSION['categoria']=="adm"){

				}else{
			?>
			<table style="display: inline; margin: 20px;">
				<tr>
					<td>
						<?php
							include('dados.php');
						?>
					</td>
				</tr>
			</table>
			<?php
				}
			?>
			
		</main>
	</center>

		<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>