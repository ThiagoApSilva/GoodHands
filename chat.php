<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			$sql3 = 'select * from chat where msg="'.$_SESSION['nome_chat'].'";';
			$banc3 = mysqli_query($conexao, $sql3);
			if($banc3){
				
		?>
				<section style="background-color: rgba(255, 153, 204, 1); border-radius: 20px; width: 550px; margin-top:50px;">
					<div style="overflow: auto; width: 550px; height: 460px; padding: 10px;">
						<table width="520" >
							<?php
								while ($res10 = mysqli_fetch_array($banc3)) {
									if($res10['envio']==$_SESSION['id_user']){
										?>
										<tr>
											<td style="color: #fff; padding: 5px;" align="right"><?php echo($res10['conversa']); ?><br></td>
										</tr>
										<?php
									}else{
										?>
										<tr>
											<td style="color: #fff; padding: 5px;" align="left"><?php echo($res10['conversa']); ?><br></td>
										</tr>
										<?php
									}
								}
							?>
						</table>
					</div>
			<?php
				}else{
					
			?>
					<div style="overflow: auto; width: 550px; height: 100px;">
						<table width="550" bgcolor="#000">
							<tr>
								<td style="color: #000;">Nenhuma mensagem foi enviada ainda!</td>
							</tr>
						</table>
					</div>
			<?php
				}
			?>
		
					<form  name="chat" method="POST" action="#">
						<table width="550">
							<tr>
								<td width="60%">
									<input type="text" name="mensagem" style="border-radius: 20px; padding-left: 10px; margin: 5px;" size="50">
								</td>
								<td width="40%" align="right">
									<input type="submit" name="Enviar" value="Enviar" class="bot" style="margin: 5px;">
								</td>
							</tr>
						</table>
					</form>


			<?php
				if(isset($_POST['Enviar'])){
					$mensagem = $_POST['mensagem'];
					if(isset($_SESSION['teste'])){
						if($_SESSION['teste']==$mensagem){
							echo('<script>window.location="#";</script>');
						}else{
							unset($_SESSION['teste']);
							$_SESSION['teste']=$mensagem;
						}
					}else{
						$mensagem = $_POST['mensagem'];
						$_SESSION['teste']=$mensagem;
					}

					$sql = 'INSERT INTO chat(msg, envio, conversa) VALUES ("'.$_SESSION['nome_chat'].'",'.$_SESSION['id_user'].',"'.$_SESSION['teste'].'");';
					$banc = mysqli_query($conexao, $sql);
					if($banc){
						echo('<script>window.location="mensagens.php";</script>');
					}else{
						echo('<script>window.alert("Erro ao cadastrar mensagem");</script>');
					}
				}
			?>
		</section>
		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
	</body>
</html>