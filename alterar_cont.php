<?php
	session_start();
	include_once('conexao.php');
	include_once('validacao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>alterar</title>
	</head>
	<body>
		<?php
			if(isset($_POST['deletar'])){
				$sql = 'delete from previa_contrato where id_previa='.$_SESSION['id_previa'].';';
				$banc = mysqli_query($conexao, $sql);
				if($banc){
					echo('<script>window.alert("Deletado com sucesso!");window.location="mensagens.php";</script>');
				}else{
					echo('<script>window.alert("Erro ao deletar, tente novamente:(");window.location="mensagens.php";</script>');
				}
			}else{
		?>
				<section class="dados" style="height: 220px; margin-top: 20px;">
					<form name="alterar" method="POST" action="" >
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
		<?php
				if(isset($_POST['enviar'])){
					$horas = $_POST['horas'];
					$valorr = $_POST['valor'];
					$valor = str_replace(",", ".", $valorr);
					$sql = 'update previa_contrato set tempo = '.$horas.', valor = '.$valor.' where id_previa='.$_SESSION['id_previa'].';';
					$banc = mysqli_query($conexao, $sql);
					if($banc){
						echo('<script>window.alert("dados alterados com sucesso");window.location="mensagens.php";</script>');
					}else{
						echo('<script>window.alert("Erro ao alterar, tente novamente:(");</script>');
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
	</body>
</html>