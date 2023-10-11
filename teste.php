<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>teste</title>
	</head>
	<body>
		<form name="tempo" method="POST" action="#">
			<select name="tempo">
				<option value=1>1:00 hora</option>
				<option value=1.5>1:30 hora</option>
				<option value=2>2:00 hora</option>
				<option value=2.5>2:30 hora</option>
			</select>
			<input type="submit" name="enviar" value="enviar">
		</form>
		<?php
			if(isset($_POST['enviar'])){
				$tempo = $_POST['tempo'];
				echo($tempo.'<br>');

				$valor = 100;
				$total = $tempo*$valor;
				$total2 = $total*0.2;
				echo($total.' nosso lucro '.$total2);
				
			}
		?>
	</body>
</html>