<?php
	session_start();
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profissionais</title>
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
				if(isset($_POST['Pesquisar'])){
					$pesquisa = $_POST['pesquisa'];
					$sql = 'select * from cadastro where nome like "%'.$pesquisa.'%" or cidade like "%'.$pesquisa.'%" or uf like "%'.$pesquisa.'%" and categoria="cuidador";';
					$res = mysqli_query($conexao, $sql);
				}else if(isset($_GET['categoriaa'])){
					$categoria = $_GET['categoria'];

					if($categoria == "todos"){
						$sql = 'select * from cadastro where categoria ="cuidador";';
						$res = mysqli_query($conexao, $sql);
						
					}else{

						$sqlt = 'select * from especificacao where nome_especificacao ="'.$categoria.'";';
						$banct = mysqli_query($conexao, $sqlt);

						if($banct){

							$result = mysqli_fetch_array($banct);
							$sql1 = 'select * from registro_especificacao where nome_especificacao ="'.$result['nome_especificacao'].'";';
							$res = mysqli_query($conexao, $sql1);
							/*$resull = mysqli_fetch_array($ress);
							$sql = 'select * from cadastro where id_usuario='.$resull['id_cuidador'].';';
							$res = mysqli_query($conexao, $sql);*/
						}

					}

				}else{
					$sql = 'select * from cadastro where categoria ="cuidador";';
					$res = mysqli_query($conexao, $sql);
				}

				while($resul = mysqli_fetch_array($res)){
					$sqls = 'select * from cadastro where id_usuario ='.$resul['id_usuario'].';';
					$bancs = mysqli_query($conexao, $sqls);
					$resuls = mysqli_fetch_array($bancs);
					if(!$resuls['foto']){
						?>
						
						<table id="paragrafo" style="text-align: center; display: inline;">
							<tr>
								<td>
									<a href="perfil_cuidador.php?visualizar=true&mod=<?php echo($resuls['id_usuario']); ?>"><img src="img/usuario.jpg" alt="login" class="quadros2"></a>
								</td>
							</tr>
							<tr>
								<td>
									<?php
										echo('<p>'.$resuls['nome'].'</p>');
									?>
								</td>
							</tr>
							<tr>
								<td>
																	</td>
							</tr>
							<tr>
								<td>
									<?php echo($resuls['cidade'].' - '.$resuls['uf']); ?>
								</td>
							</tr>
						</table>
					<?php
					}else{
					?>
						<table id="paragrafo" style="text-align: center; display: inline;">
							<tr>
								<td>
									<a href="perfil_cuidador.php?visualizar=true&mod=<?php echo($resuls['id_usuario']); ?>"><img src="<?php echo($resuls['foto']); ?>" alt="login" class="quadros2"></a>
								</td>
							</tr>
							<tr>
								<td>
									<?php
										echo('<p>'.$resuls['nome'].'</p>');
									?>
								</td>
							</tr>
							<tr>
								<td>
									<?php
										$dt_nascimento=$resuls['dt_nascimento'];
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
									<?php echo($resuls['cidade'].' - '.$resuls['uf']); ?>
								</td>
							</tr>
						</table>
						<?php
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