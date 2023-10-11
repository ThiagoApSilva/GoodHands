<?php
	session_start();
	include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<meta charset="utf-8">
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
		if(!isset($_SESSION['conf'])){
			include('menu.php');
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="Login" method="POST" action="verificacao.php" >
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Login</h4>
						<label for="usuario" class="corlink text-light">Usuário</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><img src="img/arroba.png" style="width: 15px; height: auto;"></span>
						  </div>
						  <input type="text" name="usuario" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1" id="usuario" autofocus>
						</div>
						<label for="Senha" class="corlink text-light">Senha</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text" id="basic-addon1"><img src="img/cadeado.png" style="width: 15px; height: auto;"></span>
						  	</div>
						  	<input type="password" name="senha" class="form-control" placeholder="Senha" aria-label="senha" aria-describedby="basic-addon1" id="senha">
						</div>
						<div align="center">
							<button type="submit" name="Logar" value="Logar" class="bot" style="margin-bottom: 10px;">Logar</button><br>
							<a href="index.php" class="corlink text-light" style="margin-right: 5px;">Voltar</a>
							<a href="cadastro.php" class="corlink text-light" style="margin-left: 5px;">Cadastre-se</a>		
						</div>
					</form>
				</section>
			</section>
		</section>
		<?php
			}else{
				if($_SESSION['categoria']=='cliente'){
					echo('<script>window.location="perfil_cliente.php";</script>');
				}else if($_SESSION['categoria']=='adm'){
					echo('<script>window.location="perfil_adm.php";</script>');
				}else{
					echo('<script>window.location="perfil_cuidador.php";</script>');
				}
			}
		?>

		<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>