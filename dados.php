<?php
	include_once('conexao.php');
	include_once('validacao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Dados</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
		if($_SESSION['categoria']=='cliente'){

		?>
			<section>
				<section class="dados" style="margin-top: 20px; margin-bottom: 20px; height: 200px;">
					<p align="justify" style="color: #fff;">Por motivos de segurança, o contrato será liberado com a permissão do profissional.</p>

					<?php

						$sqlc = 'select * from previa_contrato where id_cliente='.$_SESSION['id_user'].' and id_cuidador='.$_SESSION['id_cuidador'].';';
						$bancc = mysqli_query($conexao, $sqlc);
						$teste = mysqli_fetch_array($bancc);
						if($teste['liberacao']=="liberado"){
					?>
							<form name="contrato" method="POST" action="contrato.php">
								<div align="center">
									<table style="width: 350px; color: #fff;">
										<tr>
											<td align="center">Horas: <?php echo($teste['tempo']); ?></td>
										</tr>
										<tr>
											<td align="center">Valor: <?php echo($teste['valor']); ?></td>
										</tr>
										<tr>
											<td align="center">
												<br><button type="submit" class="bot">Contratar</button>
											</td>
										</tr>
									</table>
									
							</form>
					<?php
						}else{

						}
					?>
				</section>
			</section>
		<?php
		}else{

			$sql = 'select * from previa_contrato where id_cliente ='.$_SESSION['id_cliente'].' and id_cuidador='.$_SESSION['id_user'].';';
			$banc = mysqli_query($conexao, $sql);
			$teste = mysqli_fetch_array($banc);
			if($teste['liberacao']=="liberado"){
				$_SESSION['id_previa'] = $teste['id_previa'];
				?>
				<section class="dados" style="margin-top: 20px; margin-bottom: 20px; height: 200px;">
					<p align="justify" style="color: #fff;">Foi concedido a permissão, para bloqueio ou alteração dos dados abaixo, realize antes de que seja feito o contrato pelo cliente.</p>
					<form name="alterar" method="POST" action="alterar_cont.php">
						<table style="width: 350px; color: #fff;">
							<tr>
								<td align="center">Horas:</td><td align="center"><?php echo($teste['tempo']); ?></td>
							</tr>
							<tr>
								<td align="center">valor:</td><td align="center"><?php echo($teste['valor']); ?></td>
							</tr>
							<tr>
								<td align="center"><button name="deletar" type="submit" class="bot">Deletar</button></td><td align="center"><button name="alterar" type="submit" class="bot">Alterar</button></td>
							</tr>
						</table>
					</form>
				</section>
		<?php
			}else{
		?>

			<section>
				<section class="dados" style="height: 220px; margin-top: 20px;">
					<form name="Login" method="POST" action="" >
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Contrato</h4>
						<div class="form-row">
						    <div class="form-group col-md-6">
							   	<label for="horas" class="text-light corlink">Horas:</label>
						      	<select name="horas" class="form-control">
									<option value="1">01:00</option><br>
									<option value="2">02:00</option><br>
									<option value="3">03:00</option><br>
									<option value="4">04:00</option><br>
									<option value="5">05:00</option><br>
									<option value="6">06:00</option><br>
									<option value="7">07:00</option><br>
									<option value="8">08:00</option><br>
									<option value="9">09:00</option><br>
									<option value="10">10:00</option><br>
									<option value="11">11:00</option><br>
									<option value="12">12:00</option><br>
									<option value="13">13:00</option><br>
									<option value="14">14:00</option><br>
									<option value="15">15:00</option><br>
									<option value="16">16:00</option><br>
									<option value="17">17:00</option><br>
									<option value="18">18:00</option><br>
									<option value="19">19:00</option><br>
									<option value="20">20:00</option><br>
									<option value="21">21:00</option><br>
									<option value="22">22:00</option><br>
									<option value="23">23:00</option><br>
									<option value="24">24:00</option><br>
								</select>
						    </div>
						    <div class="form-group col-md-6">
						      	<label for="valor" class="text-light corlink">Valor:</label>
						      	<div class="input-group mb-3">
							   		<input type="text" name="valor" class="form-control" id="valor" placeholder="R$ 00,00" maxlength="9" onkeyup="formatarMoeda()">
							    </div>
						    </div>
						</div>
						<div style="text-align: center;">
							<button type="submit" name="enviar" value="enviar" class="bot" style="margin-bottom: 10px;"> Liberar contrato </button>
						</div>
						
					</form>
				</section>
			</section>

		<?php
			if(isset($_POST['enviar'])){
				$horas = $_POST['horas'];
				$valorr = $_POST['valor'];
				$valor = str_replace(",", ".", $valorr);
				$sql = 'insert into previa_contrato(id_cliente, id_cuidador, tempo, valor, liberacao) values ('.$_SESSION['id_cliente'].','.$_SESSION['id_user'].','.$horas.','.$valor.',"liberado");';
				$banc = mysqli_query($conexao, $sql);
				if($banc){
					echo('<script>window.location="mensagens.php";</script>');
				}else{
					echo('<script>window.alert("Erro ao acadastrar, tente novamente:(");</script>');
				}
			}
		}
		}
		?>

		<script type="text/javascript">
			function formatarMoeda() {
		        var elemento = document.getElementById('valor');
		        var valor = elemento.value;
		        

		        valor = valor + '';
		        valor = parseInt(valor.replace(/[\D]+/g, ''));
		        valor = valor + '';
		        valor = valor.replace(/([0-9]{2})$/g, ",$1");

		        if (valor.length > 6) {
		            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
		        }

		        elemento.value = valor;
		        if(valor == 'NaN') elemento.value = '';
		        
		    }
		</script>
		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
	</body>
</html>