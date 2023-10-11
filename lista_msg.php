<?php
	session_start();
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista de Mensagens!</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>

		<nav>
			<?php
				include('menu.php');
			?>
		</nav>

	<main class="container">
		<section class="centralizar">
			<span>
<?php
				
				if($_SESSION['categoria']=='cliente'){
					$sql = 'select * from registro_chat where id_criador='.$_SESSION['id_user'].';';
					$res = mysqli_query($conexao, $sql);
					
					$sqlt = 'select * from registro_chat;';
					$rest = mysqli_query($conexao, $sqlt);
					while($teste = mysqli_fetch_array($rest)){

						if($teste['id_receptor']==$_SESSION['id_user']){
							$convocado = $teste['id_criador'];
							$_SESSION['convocado'] = $convocado;

							$sqla = 'select * from registro_chat where id_receptor='.$_SESSION['id_user'].';';
							$resa = mysqli_query($conexao, $sqla);
							$resulb = mysqli_fetch_array($resa);
							
							$sql2 = 'select * from cadastro where id_usuario='.$_SESSION['convocado'].';';
							$banc2 = mysqli_query($conexao, $sql2);
							$resul2 = mysqli_fetch_array($banc2);
				
							if(!$resul2['foto']){
?>
						
								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resulb['nome_chat']); ?>"><img src="img/usuario.jpg" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												$dt_nascimento=$resul2['dt_nascimento'];
												list($ano, $mes, $dia)=explode('-', $dt_nascimento);
												$hoje= mktime(0,0,0,date('m'), date('d'), date('y'));
												$nascimento=mktime(0,0,0,$mes, $dia, $ano);
												$idade=floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
												echo('<p>Idade: '.$idade.' anos</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}else{
?>

								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resulb['nome_chat']); ?>"><img src="<?php echo($resul2['foto']); ?>" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												$dt_nascimento=$resul2['dt_nascimento'];
												list($ano, $mes, $dia)=explode('-', $dt_nascimento);
												$hoje= mktime(0,0,0,date('m'), date('d'), date('y'));
												$nascimento=mktime(0,0,0,$mes, $dia, $ano);
												$idade=floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
												echo('<p>Idade: '.$idade.' anos</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}
						}
					}

					if($res){
						while($resul = mysqli_fetch_array($res)){
							$sql2 = 'select * from cadastro where id_usuario='.$resul['id_receptor'].';';
							$banc2 = mysqli_query($conexao, $sql2);
							$resul2 = mysqli_fetch_array($banc2);
				
							if(!$resul2['foto']){
?>
						
								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resul['nome_chat']); ?>"><img src="img/usuario.jpg" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												$dt_nascimento=$resul2['dt_nascimento'];
												list($ano, $mes, $dia)=explode('-', $dt_nascimento);
												$hoje= mktime(0,0,0,date('m'), date('d'), date('y'));
												$nascimento=mktime(0,0,0,$mes, $dia, $ano);
												$idade=floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
												echo('<p>Idade: '.$idade.' anos</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}else{
?>

								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resul['nome_chat']); ?>"><img src="<?php echo($resul2['foto']); ?>" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												$dt_nascimento=$resul2['dt_nascimento'];
												list($ano, $mes, $dia)=explode('-', $dt_nascimento);
												$hoje= mktime(0,0,0,date('m'), date('d'), date('y'));
												$nascimento=mktime(0,0,0,$mes, $dia, $ano);
												$idade=floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
												echo('<p>Idade: '.$idade.' anos</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}
					
						}

//---------------------------------------------------------------------------------						

					}
				}else if($_SESSION['categoria']=='cuidador'){

					$sql = 'select * from registro_chat where id_receptor='.$_SESSION['id_user'].';';
					$res = mysqli_query($conexao, $sql);
					if($res){
						while($resul = mysqli_fetch_array($res)){
							$sql2 = 'select * from cadastro where id_usuario='.$resul['id_criador'].';';
							$banc2 = mysqli_query($conexao, $sql2);
							$resul2 = mysqli_fetch_array($banc2);
							
				
							if(!$resul2['foto']){
?>
						
								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resul['nome_chat']); ?>"><img src="img/usuario.jpg" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['telefone'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}else{
?>

								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resul['nome_chat']); ?>"><img src="<?php echo($resul2['foto']); ?>" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['telefone'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}
					
						}

//---------------------------------------------------------------------------------						

					}
					

				}else{
					$sql = 'select * from registro_chat where id_criador='.$_SESSION['id_user'].';';
					$res = mysqli_query($conexao, $sql);
					
					if($res){
						while($resul = mysqli_fetch_array($res)){
							$sql2 = 'select * from cadastro where id_usuario='.$resul['id_receptor'].';';
							$banc2 = mysqli_query($conexao, $sql2);
							$resul2 = mysqli_fetch_array($banc2);
							
				
							if(!$resul2['foto']){
?>
						
								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resul['nome_chat']); ?>"><img src="img/usuario.jpg" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['telefone'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}else{
?>

								<table id="paragrafo">
									<tr>
										<td rowspan="4">
											<a href="mensagens.php?acessar=true&mod=<?php echo($resul['nome_chat']); ?>"><img src="<?php echo($resul2['foto']); ?>" alt="login" class="quadros2"></a>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['nome'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['telefone'].'</p>');
											?>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												echo('<p>'.$resul2['email'].'</p>');
											?>
										</td>
									</tr>
								</table>
<?php
							}
					
						}

//---------------------------------------------------------------------------------						

					}
				}

?>

			</span>
		</section>
	</main>
	<br>
	<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
	</body>
</html>