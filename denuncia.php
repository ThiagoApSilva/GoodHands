<?php
	session_start();
	include('conexao.php');
	include('validacao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Denúcias</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>	
		<?php
			include('menu.php');
			if(isset($_GET['denunciar'])){
		?>
				<section class="container">
					<section class="pglogin">
						<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
							<form name="denunciaa" method="POST" action="#">
								<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Denunciar</h4>
								<p style="color: #fff;">Quando alguém é denunciado na plataforma Good Hands, nós analisamos as denúncias e removemos qualquer conteúdo que não siga os Padrões da Plataforma. Ao localizarmos a pessoa responsável, não incluímos qualquer informação sobre a pessoa que fez a denúncia, visando a integridade e segurança de nossos usuários.</p>
								<h5 align="center" class="text-light" style="font-family: Berlin Sans FB">Solicitamos suas informações para verificar se é realmente você quem está denunciando</h5>
								<div class="form-row">
								    <div class="form-group col-md-6">
								      	<label for="usuario" class="text-light corlink">Usuário:</label>
								      	<input type="text" name="usuario" class="form-control" id="usuario">
								    </div>
								    <div class="form-group col-md-6">
								      	<label for="senha" class="text-light corlink">Senha:</label>
								      	<div class="input-group mb-3">
									      	<span class="input-group-text" id="basic-addon1">$</span>
									      	<input type="password" name="senha" class="form-control" id="senha">
									    </div>
								    </div>
								</div>
								<div>
									<ul class="navbar-nav ml-auto">
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle text-light fonte corlink" href="#" data-toggle="dropdown"id="navDrop">Aqui estão algumas opções de reclamações mais comuns</a>
											<div class="dropdown-menu">
												<a href="#mensagem" class="dropdown-item">Nenhuma das alternativas ou deseja criar mensagem personalizada.</a>
												<div class="dropdown-item">
													<input type="checkbox" name="escolha1" value="marcado" >&nbsp; Cuidador não compareceu no atendimento ou chegou fora do horário combinado.
												</div>
												<div class="dropdown-item">
													<input type="checkbox" name="escolha2" value="marcado" >&nbsp; Cuidador não cumpriu com as exigências oferecidas no ato do contrato.
												</div>
												<div class="dropdown-item">
													<input type="checkbox" name="escolha3" value="marcado" >&nbsp; Cuidador não teve um bom comportamento.
												</div>
											</div>
										</li>
									</ul>
								</div>
								<br>
								<div class="form-group">
								    <label for="nome" class="text-light corlink">Mensagem personalizada:</label>
								    <a name="mensagem" for="nome2"></a>
								    <textarea name="mensagem" cols="30" rows="2" class="form-control" id="nome2" placeholder="Digite sua denúncia: ">
								    </textarea>
								</div>
								<div align="center">
									<button type="submit" name="denuncia" value="Denunciar" class="bot" style="margin-bottom: 10px;" "padding-right: 20px;"> Denunciar </button>
									<a href="index.php" style="padding-right: 20px;"> <button class="bot" style="margin-bottom: 10px;"> Voltar </button> </a>
								</div>
							</form>

							<?php
								
								if(isset($_POST['denuncia'])){
									$usuario=$_POST['usuario'];
									$senha=sha1(trim($_POST['senha']));
									if(isset($_POST['escolha1'])){
										$escolha1=$_POST['escolha1'];
									}else{
										$escolha1='não esolhido';
									}
									if(isset($_POST['escolha2'])){
										$escolha2=$_POST['escolha2'];
									}else{
										$escolha2='não esolhido';
									}
									if(isset($_POST['escolha3'])){
										$escolha3=$_POST['escolha3'];
									}else{
										$escolha3='não esolhido';
									}
									
									$mensagem=$_POST['mensagem'];

									$array = array($escolha1, $escolha2, $escolha3, $mensagem);
									$uni = implode("-", $array);


									$sql = 'select * from cadastro where usuario = "'.$usuario.'" and senha = "'.$senha.'";';
									$resul = mysqli_query($conexao,$sql);
									$conf = mysqli_fetch_array($resul);
									if(mysqli_num_rows($resul)){
										$num=0;
										if($resul){
											$sqlin= 'insert into denuncia(id_denunciador, id_denunciado, mensagem) values ("'.$_SESSION['id_user'].'", "'.$_SESSION['cuid_msg'].'", "'.$uni.'");'; 
											$inserir= mysqli_query($conexao, $sqlin);
											if($inserir){
												echo('<script>window.alert("Denúncia enviada com sucesso!");window.location="#"</script>');
											}else{
												echo('<script>window.alert("Erro ao enviar a mensagem no banco!");window.location="#"</script>');
											}					
										}						
									}else{
										echo('<script>window.alert("Erro ou falha de login");window.location="#"</script>');
									}
								}
							?>

						</section>
					</section>
				</section>
		<?php
			}else if($_GET['']){
				echo('<script>window.alert("Erro ao enviar a mensagem!");window.location="#"</script>');
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