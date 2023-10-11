<?php
	session_start();
	include('conexao.php');
	include('validacao.php');
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Perfil do cuidador</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<nav>
			<?php
				include('menu.php');
				if(isset($_GET['visualizar'])){
					$mod=$_GET['mod'];
					$sql = 'select * from cadastro where id_usuario='.$mod.';';
					$resul = mysqli_query($conexao, $sql);
					$vec_registro = mysqli_fetch_array($resul);
					$_SESSION['cuid_msg'] = $vec_registro['id_usuario'];

//---------------------------------------------------------------------------
					?>
		</nav>
		<a href="index.php"><button class="bot" style="margin: 20px;">Voltar</button></a>
		<section class="container">
			<section id="paragrafo">
				<nav class="curriculo">
				<table style="display: block;">
					<tr>
						<td rowspan="9">
							<nav class="pftamanho">
								<?php
								
									if(!$vec_registro['foto']){
										echo('<img class="perfil" src="img/usuario.jpg" alt="login" width="200" height="200">');
										if(!$vec_registro['descricao']){
											echo('<br><br>Sem Descrição');
										}else{
										?>
											<table width="250">
												<tr>
													<td width="250">
														<?php
														echo('<br><p align="justify">'.$vec_registro['descricao'].'</p>');
														?>
													</td>
												</tr>
											</table>
										<?php
											
										}
									}else{
										echo('<img class="perfil" src="'.$vec_registro['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
										if(!$vec_registro['descricao']){
											echo('<br><br>Sem Descrição');
										}else{
										?>
											<table width="250">
												<tr>
													<td width="250">
														<?php
														echo('<br><p align="justify">'.$vec_registro['descricao'].'</p>');
														?>
													</td>
												</tr>
											</table>
										<?php
											
										}
									}
									
								?>
								
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
					<tr>
						<td><p>Endereço:</p></td>
						<td><p><?php echo($vec_registro['cidade'].' - '.$vec_registro['uf']); ?></p></td>
					</tr>
					<tr>
						<td><p>Coren:</p></td>
						<td><p><?php echo($vec_registro['coren']); ?></p></td>
					</tr>
					<tr>
						<td><p>Currículo:</p></td>
						<td><a href="arquivo/<?php echo($vec_registro['arquivo']); ?>" download><p style="color: #eda6ca; text-decoration: none;">Baixar Currículo</p></a></td>
					</tr>
				</table>
			</section>
		</section>	
		<section>
			<?php

			if($_SESSION['categoria']=='cliente'){
				$sql50 = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
				$banc50= mysqli_query($conexao, $sql50);
				$resultado50 = mysqli_fetch_array($banc50);
				$_SESSION['id_cuidador'] = $vec_registro['id_usuario'];
				$array = array($resultado50['nome'], $vec_registro['nome']);
				$uni = implode("-", $array);
			?>
			<center>
				<a href="mensagens.php?mandar_mensagem=true&mod=<?php echo($uni); ?>"><button class="bot"> <?php echo('Mande uma mensagem') ?></button></a>
				<form name="denunciar" method="GET" action="denuncia.php" style="display: inline; margin: 10px;">
					<button type="submit" name="denunciar" class="bot2" style="margin: 10px;">Denunciar! </button>
				</form>
			</center>
			<?php
			}else{

			}
			?>
			<?php
				if(isset($_POST['contatar'])){
					echo('<script>window.location="mensagens.php";</script>');
				}
			?>
		</section>				
		<?php
				}else if($_SESSION['categoria']=="cuidador"){
					$sql = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
					$resul = mysqli_query($conexao, $sql);
					$vec_registro = mysqli_fetch_array($resul);
				
			?>
		</nav>
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
										if(!$vec_registro['descricao']){
											echo('<br><a href="editar_perfil.php"> Clique para adicionar sua descrição.</a>');
										}else{
										?>
											<table width="250">
												<tr>
													<td width="250">
														<?php
														echo('<br><p align="justify">'.$vec_registro['descricao'].'</p>');
														?>
													</td>
												</tr>
											</table>
										<?php
											
										}

									}else{
										echo('<img class="perfil" src="'.$vec_registro['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
										if(!$vec_registro['descricao']){
											echo('<br><a href="editar_perfil.php"> Clique para adicionar sua descrição.</a>');
										}else{
										?>
											<table width="250">
												<tr>
													<td width="250">
														<?php
														echo('<br><p align="justify">'.$vec_registro['descricao'].'</p>');
														?>
													</td>
												</tr>
											</table>
										<?php
											
										}
									}
									
								?>
								<a href="editar_perfil.php"><button class="bot">Editar Perfil</button></a>
								
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
					<tr>
						<td><p>Endereço:</p></td>
						<td><p><?php echo($vec_registro['cidade'].' - '.$vec_registro['uf']); ?></p></td>
					</tr>
					<tr>
						<td><p>Coren:</p></td>
						<td><p><?php echo($vec_registro['coren']); ?></p></td>
					</tr>
					<tr>
						<td><p>Currículo:</p></td>
						<td><a href="arquivo/<?php echo($vec_registro['arquivo']); ?>" download><p style="color: #eda6ca; text-decoration: none;">Baixar Currículo</p></a></td>
					</tr>
				</table>

			</section>
		</section>
		<?php
		}else{
			if(isset($_POST['verificar'])){
			$id = $_POST['id'];
			$sql = 'select * from cadastro where id_usuario='.$id.';';
			$resul = mysqli_query($conexao, $sql);
			$vec_registro = mysqli_fetch_array($resul);
				
			?>
		</nav>
		<section style="position: absolute; left: 0px;">
				<a href="adm.php"><button type="submit" name="sair" class="bot" style="margin: 20px;">Voltar</button></a>
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
										if(!$vec_registro['descricao']){
											echo('<br><a href="editar_perfil.php"> Clique para adicionar sua descrição.</a>');
										}else{
										?>
											<table width="250">
												<tr>
													<td width="250">
														<?php
														echo('<br><p align="justify">'.$vec_registro['descricao'].'</p>');
														?>
													</td>
												</tr>
											</table>
										<?php
											
										}

									}else{
										echo('<img class="perfil" src="'.$vec_registro['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
										if(!$vec_registro['descricao']){
											echo('<br><a href="editar_perfil.php"> Clique para adicionar sua descrição.</a>');
										}else{
										?>
											<table width="250">
												<tr>
													<td width="250">
														<?php
														echo('<br><p align="justify">'.$vec_registro['descricao'].'</p>');
														?>
													</td>
												</tr>
											</table>
										<?php
											
										}
									}
									
								?>
								<a href="editar_perfil.php"><button class="bot">Editar Perfil</button></a>
								
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
					<tr>
						<td><p>Endereço:</p></td>
						<td><p><?php echo($vec_registro['cidade'].' - '.$vec_registro['uf']); ?></p></td>
					</tr>
					<tr>
						<td><p>Coren:</p></td>
						<td><p><?php echo($vec_registro['coren']); ?></p></td>
					</tr>
					<tr>
						<td><p>Currículo:</p></td>
						<td><a href="arquivo/<?php echo($vec_registro['arquivo']); ?>" download><p style="color: #eda6ca; text-decoration: none;">Baixar Currículo</p></a></td>
					</tr>
				</table>

			</section>
		</section>
		<?php
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