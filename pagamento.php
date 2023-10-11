<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<meta charset="utf-8">
	<head>
		<title>Pagamento</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
		<body>
			<?php
			include('menu.php');
			?>
			<section class="container">
				<section class="pglogin" style="width: 500px;">
					<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
						<form name="pagamento" method="POST" action="#" enctype="multipart/form-data">
								<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Pagamento</h4>
								<div class="form-row">
								   	<div class="form-group col-md-6">
										<label for="usuario" class="text-light corlink">Usuário:</label>
										<input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário">
									</div>

								 <div class="form-group col-md-6">
								      	<label for="senha" class="text-light corlink">Senha:</label>
								      	<div class="input-group mb-3">
									      	<input type="password" name="senha" class="form-control" id="senha">
									    </div>
								    </div>
								</div>
								<div class="form-row">
								<div class="form-group col-md-6">
									<label for="CPF" class="text-light corlink">CPF:</label>
									<input type="text" name="CPF" class="form-control" id="CPF" placeholder="XXX.XXX.XXX-XX">
								</div>

								<div class="form-group col-md-6">
									<label for="cartao" class="text-light corlink">Cartão:</label>
									<input type="text" name="cartao" class="form-control" id="cartao"><br><br>
								</div>
								</div>
								<div class="form-row">
								<div class="form-group col-md-6">
									<label for="data_venc" class="text-light corlink">Dt Vencimento Cartão:</label>
									<input type="date" name="data_venc" class="form-control" id="data_venc">
								</div>
								<div class="form-group col-md-6">
									<label for="CVV" class="text-light corlink">CVV:</label>
									<input type="text" name="CVV" class="form-control" id="CVV" placeholder="XXX">
								</div>
								</div>

								<div align="center">
										<button type="submit" name="Finalizar" value="Finalizar" class="bot" style="margin-bottom: 10px;">Finalizar</button><br>
									<a href="index.php" class="corlink text-light" style="padding-right: 20px;">Voltar</a>
								</div>
						</form>

								<?php									
									if(isset($_POST['Finalizar'])){
										$usuario=$_POST['usuario'];
										$senha=$_POST['senha'];
										$cpf=$_POST['CPF'];
										$cartao=$_POST['cartao'];
										$dt_venc=$_POST['data_venc'];
										$cvv=$_POST['CVV'];

										$sqlin= 'insert into pagamento(usuario, senha, cpf, cartao, dt_venc, cvv) values ("'.$usuario.'", "'.$senha.'", "'.$cpf.'", "'.$cartao.'", "'.$dt_venc.'", "'.$cvv.'");'; 
										$inserir= mysqli_query($conexao, $sqlin);
											if($inserir){
												echo('Pagamento realizado com sucesso!');
											}else{
												echo('Erro ao realizar pagamento!');
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