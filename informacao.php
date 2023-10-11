<?php
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
		<?php

			if($_SESSION['categoria']=='cliente'){
				$sql10 = 'select * from registro_chat where id_criador='.$_SESSION['id_user'].' and id_receptor='.$_SESSION['id_cuidador'].';';
				$banc10 = mysqli_query($conexao, $sql10);
				$resultado1000 = mysqli_fetch_array($banc10);
					if($_SESSION['nome_chat']==$resultado1000['nome_chat']){
						$_SESSION['cuid_msg'] = $resultado1000['id_receptor'];
					}else{

						$sql100 = 'insert into registro_chat(id_criador, id_receptor, nome_chat) values("'.$_SESSION['id_user'].'","'.$_SESSION['id_cuidador'].'","'.$_SESSION['nome_chat'].'");';
						$banc100 = mysqli_query($conexao, $sql100);

						$sql11 = 'select * from registro_chat where nome_chat="'.$_SESSION['nome_chat'].'";';
						$banc11 = mysqli_query($conexao, $sql11);
						$resultado = mysqli_fetch_array($banc11);
						$_SESSION['cuid_msg'] = $resultado['id_receptor'];
					}

					$sqll = 'select * from cadastro where id_usuario='.$_SESSION['id_cuidador'].';';
					$exe = mysqli_query($conexao,$sqll);
					$resul = mysqli_fetch_array($exe);

//---------------------------------------------------------------
				

				
				?>
					<table class="dados" style="color: #fff;">
						<tr>
							<td align="center">
								<?php
									if(!$resul['foto']){
										echo('<img class="perfil" src="img/perfil_msg.png" alt="login" width="200" height="200"><br>');

									}else{
										echo('<img class="perfil" src="'.$resul['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
									}
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> Nome: '.$resul['nome'].'</p>');
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> E-mail: '.$resul['email'].'</p>');
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> Telefone: '.$resul['telefone'].'</p>');
								?>
							</td>
						</tr>
					</table>
				<?php
				
			
		}else if($_SESSION['categoria']=='cuidador'){
				$sql10 = 'select * from registro_chat where nome_chat="'.$_SESSION['nome_chat'].'";';
				$banc10 = mysqli_query($conexao, $sql10);
				$resultado = mysqli_fetch_array($banc10);
				$_SESSION['id_cliente'] = $resultado['id_criador'];
				$sql11 = 'select * from cadastro where id_usuario='.$resultado['id_criador'].';';
				$banc11 = mysqli_query($conexao, $sql11);
				$resultado2 = mysqli_fetch_array($banc11);
				$_SESSION['id_cliente'] = $resultado2['id_usuario'];
				$_SESSION['nome_cliente'] = $resultado2['nome'];
				if($banc11){
				?>
					<table class="dados" style="color: #fff;">
						<tr>
							<td align="center">
								<?php
									if(!$resultado2['foto']){
										echo('<img class="perfil" src="img/perfil_msg.png" alt="login" width="200" height="200"><br>');
									}else{
										echo('<img class="perfil" src="'.$resultado2['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
									}
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> Nome: '.$resultado2['nome'].'</p>');
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> E-mail: '.$resultado2['email'].'</p>');
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> Telefone: '.$resultado2['telefone'].'</p>');
								?>
							</td>
						</tr>
					</table>				
					<?php
				}
			}else{
//-------------------------------------------------------------------------------------


				$sql10 = 'select * from registro_chat where id_criador='.$_SESSION['id_user'].' and id_receptor='.$_SESSION['id'].';';
				$banc10 = mysqli_query($conexao, $sql10);
				$resultado1000 = mysqli_fetch_array($banc10);
					if($_SESSION['nome_chat']==$resultado1000['nome_chat']){
						$_SESSION['cuid_msg'] = $resultado1000['id_receptor'];
					}else{

						$sql100 = 'insert into registro_chat(id_criador, id_receptor, nome_chat) values("'.$_SESSION['id_user'].'","'.$_SESSION['id'].'","'.$_SESSION['nome_chat'].'");';
						$banc100 = mysqli_query($conexao, $sql100);

						$sql11 = 'select * from registro_chat where nome_chat="'.$_SESSION['nome_chat'].'";';
						$banc11 = mysqli_query($conexao, $sql11);
						$resultado = mysqli_fetch_array($banc11);
						$_SESSION['cuid_msg'] = $resultado['id_receptor'];
					}
					$id = $_SESSION['id'];
					$sqll = 'select * from cadastro where id_usuario='.$id.';';
					$exe = mysqli_query($conexao,$sqll);
					$resul = mysqli_fetch_array($exe);




//------------------------------------------------------------------------------------


				$sql10 = 'select * from registro_chat where nome_chat="'.$_SESSION['nome_chat'].'";';
				$banc10 = mysqli_query($conexao, $sql10);
				$resultado = mysqli_fetch_array($banc10);
				$_SESSION['id_cliente'] = $resultado['id_criador'];
				$sql11 = 'select * from cadastro where id_usuario='.$resultado['id_receptor'].';';
				$banc11 = mysqli_query($conexao, $sql11);
				$resultado2 = mysqli_fetch_array($banc11);
				if($banc11){
				?>
					<table class="dados" style="color: #fff;">
						<tr>
							<td align="center">
								<?php
									if(!$resultado2['foto']){
										echo('<img class="perfil" src="img/perfil_msg.png" alt="login" width="200" height="200"><br>');
									}else{
										echo('<img class="perfil" src="'.$resultado2['foto'].'" alt="login" width="200" height="200" style="border-radius: 100%;">');
									}
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> Nome: '.$resultado2['nome'].'</p>');
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> E-mail: '.$resultado2['email'].'</p>');
								?>
							</td>
						</tr>
						<tr>
							<td style="padding: 10px;">
								<?php
									echo('<p> Telefone: '.$resultado2['telefone'].'</p>');
								?>
							</td>
						</tr>
					</table>				
					<?php
				}
			}

		?>

		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>