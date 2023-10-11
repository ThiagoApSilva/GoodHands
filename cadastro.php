<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<meta charset="utf-8">
	<head>
		<title>Cadastro</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/jquery.mask.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		
	</head>
	<body>
		<?php
			include('menu.php');
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="cadastro" method="POST" action="#">
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Cadastrar</h4>
						<div class="form-group">
						    <label for="nome" class="text-light corlink">Nome:</label>
						    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" required>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="usuario">Usuário:</label>
						      	<input type="text" name="usuario" class="form-control" id="usuario" required>
						    </div>
						    <div class="form-group col-md-6">
						      	<label for="senha" class="text-light corlink">Senha:</label>
						      	<div class="input-group mb-3">
							      	<span class="input-group-text" id="basic-addon1"><img src="img/cadeado.png" style="width: 15px; height: auto;"></span>
							      	<input type="password" name="senha" class="form-control" id="senha" required>
							    </div>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="email" class="text-light corlink">E-mail:</label>
						      	<div class="input-group mb-3">
							      	<span class="input-group-text" id="basic-addon1"><img src="img/arroba.png" style="width: 15px; height: auto;"></span>
							      	<input type="email" name="email" class="form-control" id="email" required>
							     </div>
						    </div>
						    <div class="form-group col-md-6">
						      	<label for="telefone" class="text-light corlink" >Telefone:</label>
						      	<input type="text" name="telefone" class="form-control" id="telefone" onkeypress="$(this).mask('(00)0 0000-0000')" maxlength="11" required>
						    </div>
						</div>
						<div align="center">
							<button type="submit" name="Cadastrar" value="Cadastrar" class="bot" style="margin-bottom: 10px;"> Cadastrar </button><br>
							<a href="index.php" class="corlink text-light" style="margin-right: 5px;"> Voltar </a>
							<a href="cadastro_cuidador.php" class="corlink text-light" style="margin-left: 5px;"> Cadastre-se como cuidador </a>		
						</div>
					</form>

					<?php
						if(isset($_POST['Cadastrar'])){
							$nome=$_POST['nome'];
							$usuario=$_POST['usuario'];
							$senha=sha1(trim($_POST['senha']));
							$email=$_POST['email'];
							$telefone=$_POST['telefone'];

							$sqlin= 'INSERT INTO cadastro(nome, usuario, senha, email, telefone, categoria) VALUES ("'.$nome.'", "'.$usuario.'", "'.$senha.'", "'.$email.'", "'.$telefone.'","cliente");'; 
							$inserir= mysqli_query($conexao, $sqlin);
								if($inserir){
									echo('<script>window.alert("Usuário cadastrado com sucesso!");window.location="login.php";</script>');
								}else{
									echo('<script>window.alert("Erro ou falha ao cadastrar!");window.location="cadastro.php";</script>');
								}	

						}
					?>

				</section>
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