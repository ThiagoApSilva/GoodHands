<?php
 session_start();
	include('validacao.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Administrador</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery.mask.min.js"></script>s
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			$sql10 ='select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
			$banc10 = mysqli_query($conexao, $sql10);
			$informacao = mysqli_fetch_array($banc10);
			
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="Login" method="POST" action="#" enctype="multipart/form-data">
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Alterar Dados</h4>
							
							<div class="form-group">
							    <label for="nome" class="text-light corlink">Nome:</label>
							    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" value="<?php echo($informacao['nome']) ?>">
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="usuario" class="text-light corlink">Usuário:</label>
							      	<input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo($informacao['usuario']) ?>">
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="dt_nascimento" class="text-light corlink">Data de Nascimento:</label>
							      	<div class="input-group mb-3">
								      	<input type="date" name="dt_nascimento" class="form-control" id="dt_nascimento" value="<?php echo($informacao['dt_nascimento']) ?>">
								     </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="email" class="text-light corlink">E-mail:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1">@</span>
								      	<input type="email" name="email" class="form-control" id="email" value="<?php echo($informacao['email']) ?>">
								     </div>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="telefone" class="text-light corlink">Telefone:</label>
							      	<input type="text" name="telefone" class="form-control" id="telefone" placeholder="(XX)X XXXX-XXXX" onkeypress="$(this).mask('(00)0 0000-0000')" value="<?php echo($informacao['telefone']) ?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="descricao" class="text-light corlink">Descrição:</label><br>
							    <textarea cols="100%" rows="3" type="text" name="descricao" maxlength="256">
							    	<?php echo($informacao['descricao']) ?>
							    </textarea>
							   
							</div>

							<div class="form-group">
							    <label for="foto" class="text-light corlink">Nova Foto:</label>
							    <input type="file" name="foto" class="form-control" id="nome" placeholder="Foto">
							</div>

							<div align="center">
								<button type="submit" name="Alterar" value="Alterar" class="bot" style="margin-bottom: 10px;">Alterar</button><br>
							<a href="perfil_cuidador.php" class="corlink text-light" >Voltar</a>
						</div>
					</form>
					<?php
						if(isset($_POST['Alterar'])){
							$nome=$_POST['nome'];
							$usuario=$_POST['usuario'];
							$email=$_POST['email'];
							$telefone=$_POST['telefone'];
							$dt_nascimento=$_POST['dt_nascimento'];
							$descricao=$_POST['descricao'];
							$foto = $_FILES['foto'];
//----------------------------------------Foto------------------------------------------------
							if(!empty($foto['name'])){
									if(!preg_match("/^image\/jpg|jpeg|gif|png|bmp$/",$foto['type'])){
										echo('<script>window.alert("Arquivo não compativel!");window.location ="#";</script>');
									}else{
										preg_match("/\.(jpg|jpeg|bmp|gif|png){1}$/i", $foto["name"], $tipo);
										$nome_img = md5(uniqid(time())).'.'.$tipo[1];
										$caminho = "perfil/".$nome_img;
										move_uploaded_file($foto["tmp_name"], $caminho);
										$sql5 = 'UPDATE cadastro set foto="'.$caminho.'" where id_usuario='.$_SESSION['id_user'].';';
										$execut = mysqli_query($conexao,$sql5);
										if($execut){
											echo('<script>window.alert("Imagem alterada com sucesso!");</script>');
										}else{
											echo('<script>window.alert("Erro ao alterar imagem!")</script>');
										}
									}
								}else{
									echo('<script>window.alert("Nenhuma imagem selecionada.");</script>');
								}
//-----------------------------------------------------------------------------							
						$sqlin = 'UPDATE cadastro set nome="'.$nome.'", usuario="'.$usuario.'", dt_nascimento="'.$dt_nascimento.'", email="'.$email.'", telefone="'.$telefone.'", descricao="'.$descricao.'" where id_usuario='.$_SESSION['id_user'].';';

						$inserir= mysqli_query($conexao, $sqlin);	
						if($inserir){
							echo('<script>window.alert("Dados alterado com sucesso!");window.location="perfil_adm.php";</script>');
						}else{
							echo('<script>window.alert("Erro de alteração!");</script>');
						}		
					}
					?>
				</section>
			</section>
		</section>
		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>