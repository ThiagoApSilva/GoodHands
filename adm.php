<?php
	session_start();
	include('conexao.php');
	include('validacao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Administrador</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		<style type="text/css">
			table tr td{
				padding-right: 5px;
				padding-left: 5px;
			}
		</style>
	</head>
	<?php
		include_once('menu.php');
	?>
	<body>
		<main class="container">
			<center>
		<section style="margin: 20px;">	
			<table style="display: inline;">
				<tr>
					<td>
						<form name="pesquisar" action="#" method="POST">
							<button type="submit" name="denuncia" value="denuncia" class="bot" style="margin-right: 40px;">Acessar Denúncias
							</button>
						</form>
					</td>
				</tr>
			</table>
		
		
			<table style="display: inline;">
				<tr>
					<td>
						<form name="pesquisar" action="#" method="POST">
							<input type="text" name="pesquisa" class="pesquisar" placeholder="Pesquisar ID do Usuário">
							<button type="submit" name="buscar" value="buscar" class="bot">Pesquisar</button>
						</form>
					</td>
				</tr>
			</table>
		</section>
		</center>

		<?php
			if(isset($_POST['buscar'])){
				$pesquisa = $_POST['pesquisa'];
				$sql = 'SELECT * FROM cadastro WHERE id_usuario='.$pesquisa.' or nome like "%'.$pesquisa.'%";';
				$banc = mysqli_query($conexao,$sql);
				if($banc){
				while($resul = mysqli_fetch_array($banc)){
					?>
					<section class="container">
						<section id="paragrafo">
							<nav class="curriculo">
							<?php
							if($resul['categoria']=="cuidador"){
							?>
							<table style="display: block;" class="centro">
								<tr>
									<td rowspan="16">
										<nav class="pftamanho">
											<?php
											
												if(!$resul['foto']){
													echo('<img class="perfil" src="img/usuario.jpg" alt="login" width="200" height="200"><br>');
													if(!$resul['descricao']){
														
													}else{
													?>
														<table width="250">
															<tr>
																<td width="250">
																	<?php
																	echo('<br><p align="justify">'.$resul['descricao'].'</p>');
																	?>
																</td>
															</tr>
														</table>
													<?php
														
													}

												}else{
													echo('<img class="perfil" src="'.$resul['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
													if(!$resul['descricao']){
														
													}else{
													?>
														<table width="250">
															<tr>
																<td width="250">
																	<?php
																	echo('<br><p align="justify">'.$resul['descricao'].'</p>');
																	?>
																</td>
															</tr>
														</table>
													<?php
														
													}
												}

											?>
											<form name="editar" method="POST" action="editar_perfil.php">
												<input type="hidden" name="id" value="<?php echo($resul['id_usuario']); ?>">
												<button type="submit" name="editar" class="bot" style="margin: 20px;">Editar</button>
											</form>

											<form name="apagar" method="POST" action="apagar.php" style="display: inline; margin-left: 10px;">
												<input type="hidden" name="ap" value="<?php echo($resul['id_usuario']); ?>">
												<button type="submit" name="apagar_adm" value="apagar_adm" class="bot">Deletar</button>
											</form>
											
										</nav>
									</td>
								</tr>
								<tr>
									<td width="200"><p>ID do Usuário:</p></td>
									<td><p><?php echo($resul['id_usuario']); ?></p></td>
								</tr>
								<tr>
									<td width="200"><p>Nome: </p></td>
									<td><p><?php echo($resul['nome']); ?></p></td>
								</tr>
								<tr>
									<td><p>Usuário:</p></td>
									<td><p><?php echo($resul['usuario']); ?></p></td>
								</tr>
								<tr>
									<td><p>Data de Nascimento:</p></td>
									<td><p><?php $dt_fin=implode("/",array_reverse(explode("-",$resul['dt_nascimento']))); echo($dt_fin); ?></p></td>
								</tr>
								<tr>
									<td><p>E-mail:</p></td>
									<td><p><?php echo($resul['email']); ?></p></td>
								</tr>
								<tr>
									<td><p>Telefone:</p></td>
									<td><p><?php echo($resul['telefone']); ?></p></td>
								</tr>
								<tr>
									<td><p>CEP:</p></td>
									<td><p><?php echo($resul['cep']); ?></p></td>
								</tr>
								<tr>
									<td><p>Estado:</p></td>
									<td><p><?php echo($resul['uf']); ?></p></td>
								</tr>
								<tr>
									<td><p>IBGE:</p></td>
									<td><p><?php echo($resul['ibge']); ?></p></td>
								</tr>
								<tr>
									<td><p>Cidade:</p></td>
									<td><p><?php echo($resul['cidade']); ?></p></td>
								</tr>
								<tr>
									<td><p>Bairro:</p></td>
									<td><p><?php echo($resul['bairro']); ?></p></td>
								</tr>
								<tr>
									<td><p>Rua:</p></td>
									<td><p><?php echo($resul['rua']); ?></p></td>
								</tr>
								<tr>
									<td><p>Numero:</p></td>
									<td><p><?php echo($resul['numero']); ?></p></td>
								</tr>
								<tr>
									<td><p>Coren:</p></td>
									<td><p><?php echo($resul['coren']); ?></p></td>
								</tr>
								<tr>
									<td><p>Currículo:</p></td>
									<td><a href="arquivo/<?php echo($resul['arquivo']); ?>" download><p style="color: #eda6ca; text-decoration: none;">Baixar Currículo</p></a></td>
								</tr>
							</table>
							<?php
							}else{
							?>
							<table style="display: block;" class="centro">
								<tr>
									<td rowspan="16">
										<nav class="pftamanho">
											<?php
											
												if(!$resul['foto']){
													echo('<img class="perfil" src="img/usuario.jpg" alt="login" width="200" height="200"><br>');
													if(!$resul['descricao']){
														
													}else{
													?>
														<table width="250">
															<tr>
																<td width="250">
																	<?php
																	echo('<br><p align="justify">'.$resul['descricao'].'</p>');
																	?>
																</td>
															</tr>
														</table>
													<?php
														
													}

												}else{
													echo('<img class="perfil" src="'.$resul['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
													if(!$resul['descricao']){
														
													}else{
													?>
														<table width="250">
															<tr>
																<td width="250">
																	<?php
																	echo('<br><p align="justify">'.$resul['descricao'].'</p>');
																	?>
																</td>
															</tr>
														</table>
													<?php
														
													}
												}

											?>
											<form name="editar" method="POST" action="editar_perfil_cliente.php">
												<input type="hidden" name="id" value="<?php echo($resul['id_usuario']); ?>">
												<button type="submit" name="editar" class="bot" style="margin: 20px;">Editar</button>
											</form>

											<form name="apagar" method="POST" action="apagar.php" style="display: inline; margin-left: 10px;">
												<input type="hidden" name="ap" value="<?php echo($resul['id_usuario']); ?>">
												<button type="submit" name="apagar_adm" value="apagar_adm" class="bot">Deletar</button>
											</form>
											
										</nav>
									</td>
								</tr>
								<tr>
									<td width="200"><p>ID do Usuário:</p></td>
									<td><p><?php echo($resul['id_usuario']); ?></p></td>
								</tr>
								<tr>
									<td width="200"><p>Nome: </p></td>
									<td><p><?php echo($resul['nome']); ?></p></td>
								</tr>
								<tr>
									<td><p>Usuário:</p></td>
									<td><p><?php echo($resul['usuario']); ?></p></td>
								</tr>
								<tr>
									<td><p>Data de Nascimento:</p></td>
									<td><p><?php $dt_fin=implode("/",array_reverse(explode("-",$resul['dt_nascimento']))); echo($dt_fin); ?></p></td>
								</tr>
								<tr>
									<td><p>E-mail:</p></td>
									<td><p><?php echo($resul['email']); ?></p></td>
								</tr>
								<tr>
									<td><p>Telefone:</p></td>
									<td><p><?php echo($resul['telefone']); ?></p></td>
								</tr>
								
							</table>
							<?php
							}
							?>
							</nav>

						</section>
					</section>
					<?php
				}
				}else{
					echo('<script>window.alert("Nenhum usuario relacionado!");</script>');
				}
			}else if(isset($_POST['denuncia'])){
				$sql = 'select * from denuncia;';
				$banc = mysqli_query($conexao,$sql);
				while($resul = mysqli_fetch_array($banc)){
					$sqld = 'select * from cadastro where id_usuario ='.$resul['id_denunciador'].';';
					$bancd = mysqli_query($conexao, $sqld);
					$resuld = mysqli_fetch_array($bancd);
					$sqla = 'select * from cadastro where id_usuario ='.$resul['id_denunciado'].';';
					$banca = mysqli_query($conexao, $sqla);
					$resula = mysqli_fetch_array($banca);
					?>
				<center>
					<section style="background-color: rgba(255, 153, 204, 1); border-radius: 20px; width: 550px; margin-top:50px; color: #fff;">
					<table border="2" align="center">
						<tr >
							<td rowspan="4">Denunciador</td>
						</tr>
						<tr>
							<td>ID do Usuário</td><td><?php echo($resuld['id_usuario']) ?></td>
						</tr>
						<tr>
							<td>Usuário:</td><td><?php echo($resuld['usuario']) ?></td>
						</tr>
						<tr>
							<td>Nome:</td><td><?php echo($resuld['nome']) ?></td>
						</tr>
						<tr>
							<td></td>
						</tr>

						<tr>
							<td rowspan="4">Denunciado</td>
						</tr>
						<tr>
							<td style="padding-top: 15px;">ID do Usuário</td><td style="padding-top: 15px;"><?php echo($resula['id_usuario']) ?></td>
						</tr>
						<tr>
							<td>Usuário:</td><td><?php echo($resula['usuario']) ?></td>
						</tr>
						<tr>
							<td>Nome:</td><td><?php echo($resula['nome']) ?></td>
						</tr>

						<tr>
							<td style="padding-top: 15px;">Mensagem</td>
							<td colspan="2" style="padding-top: 15px;"><?php echo($resul['mensagem']) ?></td>
						</tr>
						<tr>
							<td align="center" style="padding-top: 15px;">
								<form name="apagar" method="POST" action="deletar_denuncia.php">
									<input type="hidden" name="ap" value="<?php echo($resul['id_denuncia']); ?>">
									<button type="submit" name="apagar" class="bot" style="margin: 20px;">Deletar Denuncia</button>
								</form>
							</td>
							<td align="center" style="padding-top: 15px;">
								<form name="apagar" method="POST" action="mensagens.php">
									<input type="hidden" name="id" value="<?php echo($resuld['id_usuario']); ?>">
									<button type="submit" name="conversar" class="bot" style="margin: 20px;">Conversar</button>
								</form>
							</td>
							<td align="center" style="padding-top: 15px;">
								<form name="apagar" method="POST" action="perfil_cuidador.php">
									<input type="hidden" name="id" value="<?php echo($resula['id_usuario']); ?>">
									<button type="submit" name="verificar" class="bot" style="margin: 20px;">Verificar Denunciado</button>
								</form>
								
							</td>
						</tr>

					</table>
					</section>
				</center>
					<br><br>

					<?php
				}
			}else{
				echo('<p align="center">Nenhuma opção escolhida!</p>');
			}

		?>
		</main>
		<footer>
			
			<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
	</body>
</html>