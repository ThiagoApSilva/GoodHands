<?php
	session_start();
	include('conexao.php');
	include('validacao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Perfil</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			include('menu.php');
			$sql = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
			$resul = mysqli_query($conexao, $sql);
			$vec_registro = mysqli_fetch_array($resul);
		?>
		<section style="position: absolute; left: 0px;">
			<form name="sai" method="POST" action="#">
				<button type="submit" name="sair" class="bot" style="margin: 20px;">Sair da conta</button>
			</form>
		</section>
		<section style="position: absolute; right: 0px;">
			<form name="apagar" method="POST" action="apagar.php">
				<input type="hidden" name="ap" value="<?php echo($_SESSION['id_user']); ?>">
				<button type="submit" name="apagar" class="bot" style="margin: 20px;">Apagar conta</button>
			</form>
		</section>

			<?php
				if(isset($_POST['sair'])){
					session_destroy();
					echo('<script>window.location="index.php";</script>');
				}
			?>
		
		
		<section class="container">
			<section id="paragrafo">
				<nav class="curriculo">
				<table style="display: block;" class="centro">
					<tr>
						<td rowspan="9">
							<nav class="pftamanho">
								<?php
								
									if(!$vec_registro['foto']){
										echo('<img class="perfil" src="img/usuario.jpg" alt="login" width="200" height="200"><br>');

									}else{
										echo('<img class="perfil" src="'.$vec_registro['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
									}
									
								?>
								<br><a href="editar_perfil_cliente.php"><button class="bot">Editar Perfil</button></a>
								
							</nav>
						</td>
					</tr>
					<tr>
						<td width="200"><p>Nome: </p></td>
						<td><p><?php echo($vec_registro['nome']); ?></p></td>
					</tr>
					<tr>
						<td><p>Usuário:</p></td>
						<td><p><?php echo($vec_registro['usuario']); ?></p></td>
					</tr>
					<tr>
						<td><p>Data de Nascimento:</p></td>
						<td><p><?php $dt_fin=implode("/",array_reverse(explode("-",$vec_registro['dt_nascimento']))); echo($dt_fin); ?></p></td>
					</tr>
					<tr>
						<td><p>E-mail:</p></td>
						<td><p><?php echo($vec_registro['email']); ?></p></td>
					</tr>
					<tr>
						<td><p>Telefone:</p></td>
						<td><p><?php echo($vec_registro['telefone']); ?></p></td>
					</tr>
				</table>

			</section>
		</section>
		<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
	</body>
</html>