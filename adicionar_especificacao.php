<?php
	session_start();
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>categoria</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<section class="container">
			<section class="dados" style="height: 150px; margin-left: auto; margin-right: auto; margin-top: 300px;">
				<h4 align="center" class="text-light">Adicionar nova Especificação</h4>
				<form name="especificacao" action="#" method="POST">
					<label for="especificacao" class="text-light">Nome da Especificação</label>
					<input type="text" name="especificacao" placeholder="Eespecificação" id="especificacao"><br>
					<div align="center">
						<button class="bot" style="margin: 20px;"><a href="cadastro_cuidador.php" style="color: #eda6ca;">Voltar</a></button>
						<button type="submit" name="adicionar" value="enviar" class="bot">Adicionar</button>
					</div>
				</form>
				<?php
					if(isset($_POST['adicionar'])){
						$especificacao = $_POST['especificacao'];
						$sql = 'insert into especificacao(nome_especificacao) values ("'.$especificacao.'");';
						$banco = mysqli_query($conexao, $sql);
						if($banco){
							echo('<script>window.alert("Nova especificação cadastrada com sucesso!");window.location="cadastro_cuidador.php"</script>');
						}else{
							echo('<script>window.alert("Verifique se o campo foram preenchido corretamente!");window.location="#"</script>');
						}
					}
				?>
			</section>
		</section>
		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>