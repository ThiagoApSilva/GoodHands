<?php
	session_start();
	include_once('conexao.php');
	include_once('validacao.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Apagar</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			if(isset($_POST['apagar'])){
				$apagar = $_POST['ap'];
				$sql = 'DELETE from denuncia where id_denuncia ='.$apagar.';';
				$banc = mysqli_query($conexao, $sql);
				if($banc){
					echo('<script>window.alert("Denuncia deletada com sucesso!");window.location="adm.php";</script>');
				}else{
					echo('<script>window.alert("Erro ao deletar denuncia");window.location="adm.php";</script>');
				}
			}
			?>
	</body>
</html>