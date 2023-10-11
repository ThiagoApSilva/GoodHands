<?php
 session_start();
	include('validacao.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Perfil</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery.mask.min.js"></script>
		<script src="js/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		<script type="text/javascript" >
    
		    function limpa_formulário_cep() {
		            //Limpa valores do formulário de cep.
		            document.getElementById('rua').value=("");
		            document.getElementById('bairro').value=("");
		            document.getElementById('cidade').value=("");
		            document.getElementById('uf').value=("");
		            document.getElementById('ibge').value=("");
		    }

		    function meu_callback(conteudo) {
		        if (!("erro" in conteudo)) {
		            //Atualiza os campos com os valores.
		            document.getElementById('rua').value=(conteudo.logradouro);
		            document.getElementById('bairro').value=(conteudo.bairro);
		            document.getElementById('cidade').value=(conteudo.localidade);
		            document.getElementById('uf').value=(conteudo.uf);
		            document.getElementById('ibge').value=(conteudo.ibge);
		        } //end if.
		        else {
		            //CEP não Encontrado.
		            limpa_formulário_cep();
		            alert("CEP não encontrado.");
		        }
		    }
        
		    function pesquisacep(valor) {

		        //Nova variável "cep" somente com dígitos.
		        var cep = valor.replace(/\D/g, '');

		        //Verifica se campo cep possui valor informado.
		        if (cep != "") {

		            //Expressão regular para validar o CEP.
		            var validacep = /^[0-9]{8}$/;

		            //Valida o formato do CEP.
		            if(validacep.test(cep)) {

		                //Preenche os campos com "..." enquanto consulta webservice.
		                document.getElementById('rua').value="...";
		                document.getElementById('bairro').value="...";
		                document.getElementById('cidade').value="...";
		                document.getElementById('uf').value="...";
		                document.getElementById('ibge').value="...";

		                //Cria um elemento javascript.
		                var script = document.createElement('script');

		                //Sincroniza com o callback.
		                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

		                //Insere script no documento e carrega o conteúdo.
		                document.body.appendChild(script);

		            } //end if.
		            else {
		                //cep é inválido.
		                limpa_formulário_cep();
		                alert("Formato de CEP inválido.");
		            }
		        } //end if.
		        else {
		            //cep sem valor, limpa formulário.
		            limpa_formulário_cep();
		        }
    		};

    	</script>
	</head>
	<body>
		<?php
			
			if($_SESSION['categoria']=="cuidador"){
				$sql10 ='select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
				$banc10 = mysqli_query($conexao, $sql10);
				$informacao = mysqli_fetch_array($banc10);
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="Login" method="POST" action="#" enctype="multipart/form-data">
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Alterar Cuidador</h4>
							
							<div class="form-group">
							    <label for="nome" class="text-light corlink">Nome:</label>
							    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" value="<?php echo($informacao['nome']) ?>">
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="usuario" class="text-light corlink">Usuário:</label>
							      	<input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo($informacao['usuario']) ?>">
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="dt_nascimento" class="text-light corlink">Data de Nascimento:</label>
							      	<div class="input-group mb-3">
								      	<input type="date" name="dt_nascimento" class="form-control" id="dt_nascimento" value="<?php echo($informacao['dt_nascimento']) ?>">
								     </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="email" class="text-light corlink">E-mail:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1">@</span>
								      	<input type="email" name="email" class="form-control" id="email" value="<?php echo($informacao['email']) ?>">
								     </div>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="telefone" class="text-light corlink">Telefone:</label>
							      	<input type="text" name="telefone" onkeypress="$(this).mask('(00)0 0000-0000')" class="form-control" id="telefone" placeholder="(XX)X XXXX-XXXX" value="<?php echo($informacao['telefone']) ?>">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">CEP:</label>
							      	<input type="text" name="cep" class="form-control" value="" id="cep" onblur="pesquisacep(this.value);" onkeypress="$(this).mask('00000-0000')" placeholder="CEP" value="<?php echo($informacao['cep']) ?>">
							    </div>
							    
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">Estado:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="uf" class="form-control" id="uf" placeholder="Estado" value="<?php echo($informacao['uf']) ?>">
								    </div>
							    </div>
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">IBGE:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="ibge" class="form-control" id="ibge" value="<?php echo($informacao['ibge']) ?>">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink">Cidade:</label>
							      	<input type="text" name="cidade" class="form-control" value="" id="cidade" placeholder="Cidade" value="<?php echo($informacao['cidade']) ?>">
							    </div>
							    
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink">Bairro:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" value="<?php echo($informacao['bairro']) ?>">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
							      	<label class="text-light corlink">Rua:</label>
							      	<input type="text" name="rua" class="form-control" value="" id="rua" placeholder="Rua" value="<?php echo($informacao['rua']) ?>">
							    </div>
							    
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">N°:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="numero" class="form-control" id="numero" placeholder="Numero da casa" value="<?php echo($informacao['numero']) ?>">
								    </div>
							    </div>
							</div>

							<div class="form-group">
							    <label for="descricao" class="text-light corlink">Descrição:</label><br>
							    <textarea cols="100%" rows="3" type="text" name="descricao" maxlength="256">
							    	<?php echo($informacao['descricao']) ?>
							    </textarea>
							   
							</div>

							<div class="form-group">
							    <label for="curriculo" class="text-light corlink">Currículo:</label>
							    <input type="file" name="arquivo" class="form-control" id="curriculo" placeholder="Currículo">
							</div>
							<div class="form-group">
							    <label for="foto" class="text-light corlink">Nova Foto:</label>
							    <input type="file" name="foto" class="form-control" id="nome" placeholder="Foto">
							</div>

							<div align="center">
								<button type="submit" name="Alterar" value="Alterar" class="bot" style="margin-bottom: 10px;">Alterar</button><br>
							<a href="perfil_cuidador.php" class="corlink text-light">Voltar</a>
						</div>
					</form>
					<?php
						if(isset($_POST['Alterar'])){
							$nome=$_POST['nome'];
							$usuario=$_POST['usuario'];
							$email=$_POST['email'];
							$telefone=$_POST['telefone'];
							$cep=$_POST['cep'];
							$uf=$_POST['uf'];
							$ibge=$_POST['ibge'];
							$cidade=$_POST['cidade'];
							$bairro=$_POST['bairro'];
							$rua=$_POST['rua'];
							$numero=$_POST['numero'];
							$dt_nascimento=$_POST['dt_nascimento'];
							$descricao=$_POST['descricao'];
							$arquivo = $_FILES['arquivo'];
							$foto = $_FILES['foto'];
//----------------------------------------Foto------------------------------------------------
							if(!empty($foto['name'])){
									if(!preg_match("/^image\/jpg|jpeg|gif|png|bmp$/",$foto['type'])){
										echo('<script>window.alert("Arquivo não compativel!");window.location ="#";</script>');
									}else{
										preg_match("/\.(jpg|jpeg|bmp|gif|png){1}$/i", $foto["name"], $tipo);
										$nome_img = md5(uniqid(time())).'.'.$tipo[1];
										$caminho = "perfil/".$nome_img;
										move_uploaded_file($foto["tmp_name"], $caminho);
										$sql5 = 'UPDATE cadastro set foto="'.$caminho.'" where id_usuario='.$_SESSION['id_user'].';';
										$execut = mysqli_query($conexao,$sql5);
										if($execut){
											echo('<script>window.alert("Imagem alterada com sucesso!");</script>');
										}else{
											echo('<script>window.alert("Erro ao alterar imagem!")</script>');
										}
									}
								}else{
									echo('<script>window.alert("Nenhuma imagem selecionada.");</script>');
								}


//-------------------------------------------- arquivo ----------------------------------------------------

							$padrao = array('.pdf');

							$extensao= strrchr($_FILES['arquivo'] ['name'], '.');

							if(in_array($extensao, $padrao)===false){
								echo('<script>window.alert("Todos os arquivos de documentação fora a foto de perfil, devem estar em PDF.");</script>');
							}else{
								preg_match("/\.(pdf){1}$/i",$arquivo["name"],$ext);

								$nome_curriculo=sha1(uniqid(time())).'.'.$ext[1];
								$caminho="arquivo/".$nome_curriculo;
								move_uploaded_file($arquivo["tmp_name"], $caminho);
								$sql6 = 'UPDATE cadastro set arquivo="'.$caminho.'" where id_usuario="'.$_SESSION['id_user'].'";';
								$execut = mysqli_query($conexao,$sql6);
							}
//-----------------------------------------------------------------------------		

				
						$sqlin = 'UPDATE cadastro set nome="'.$nome.'", usuario="'.$usuario.'", dt_nascimento="'.$dt_nascimento.'", email="'.$email.'", telefone="'.$telefone.'", cep='.$cep.', uf="'.$uf.'", ibge="'.$ibge.'", cidade="'.$cidade.'", bairro="'.$bairro.'", rua="'.$rua.'", numero="'.$numero.'", descricao="'.$descricao.'" where id_usuario='.$_SESSION['id_user'].';';

						$inserir= mysqli_query($conexao, $sqlin);	
						if($inserir){
							echo('<script>window.alert("Dados alterado com sucesso!");window.location="perfil_cuidador.php";</script>');
						}else{
							echo('<script>window.alert("Erro de alteração!");</script>');
						}		
					}
					?>
				</section>
			</section>
		</section>
		<?php

			}else{
				if(isset($_POST['editar'])){
					$id = $_POST['id'];
					$_SESSION['id'] = $id;
					$sql10 ='select * from cadastro where id_usuario='.$id.';';
					$banc10 = mysqli_query($conexao, $sql10);
					$informacao = mysqli_fetch_array($banc10);
				}
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="Login" method="POST" action="#" enctype="multipart/form-data">
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Alterar Cuidador</h4>
							
							<div class="form-group">
							    <label for="nome" class="text-light corlink">Nome:</label>
							    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" value="<?php echo($informacao['nome']) ?>">
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="usuario" class="text-light corlink">Usuário:</label>
							      	<input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo($informacao['usuario']) ?>">
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="dt_nascimento" class="text-light corlink">Data de Nascimento:</label>
							      	<div class="input-group mb-3">
								      	<input type="date" name="dt_nascimento" class="form-control" id="dt_nascimento" value="<?php echo($informacao['dt_nascimento']) ?>">
								     </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="email" class="text-light corlink">E-mail:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1">@</span>
								      	<input type="email" name="email" class="form-control" id="email" value="<?php echo($informacao['email']) ?>">
								     </div>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="telefone" class="text-light corlink">Telefone:</label>
							      	<input type="text" name="telefone" class="form-control" id="telefone" placeholder="(XX)X XXXX-XXXX" value="<?php echo($informacao['telefone']) ?>">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">CEP:</label>
							      	<input type="text" name="cep" class="form-control" value="" id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" value="<?php echo($informacao['cep']) ?>">
							    </div>
							    
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">Estado:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="uf" class="form-control" id="uf" placeholder="Estado" value="<?php echo($informacao['uf']) ?>">
								    </div>
							    </div>
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">IBGE:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="ibge" class="form-control" id="ibge" value="<?php echo($informacao['ibge']) ?>">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink">Cidade:</label>
							      	<input type="text" name="cidade" class="form-control" value="" id="cidade" placeholder="Cidade" value="<?php echo($informacao['cidade']) ?>">
							    </div>
							    
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink">Bairro:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" value="<?php echo($informacao['bairro']) ?>">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
							      	<label class="text-light corlink">Rua:</label>
							      	<input type="text" name="rua" class="form-control" value="" id="rua" placeholder="Rua" value="<?php echo($informacao['rua']) ?>">
							    </div>
							    
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">N°:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="numero" class="form-control" id="numero" placeholder="Numero da casa" value="<?php echo($informacao['numero']) ?>">
								    </div>
							    </div>
							</div>

							<div class="form-group">
							    <label for="descricao" class="text-light corlink">Descrição:</label><br>
							    <textarea cols="100%" rows="3" type="text" name="descricao" maxlength="256">
							    	<?php echo($informacao['descricao']) ?>
							    </textarea>
							   
							</div>

							<div class="form-group">
							    <label for="curriculo" class="text-light corlink">Currículo:</label>
							    <input type="file" name="arquivo" class="form-control" id="curriculo" placeholder="Currículo">
							</div>
							<div class="form-group">
							    <label for="foto" class="text-light corlink">Nova Foto:</label>
							    <input type="file" name="foto" class="form-control" id="nome" placeholder="Foto">
							</div>

							<div align="center">
								<button type="submit" name="Alterar" value="Alterar" class="bot" style="margin-bottom: 10px;">Alterar</button><br>
							<a href="adm.php" class="corlink text-light">Voltar</a>
						</div>
					</form>
					<?php
						if(isset($_POST['Alterar'])){
							$nome=$_POST['nome'];
							$usuario=$_POST['usuario'];
							$email=$_POST['email'];
							$telefone=$_POST['telefone'];
							$cep=$_POST['cep'];
							$uf=$_POST['uf'];
							$ibge=$_POST['ibge'];
							$cidade=$_POST['cidade'];
							$bairro=$_POST['bairro'];
							$rua=$_POST['rua'];
							$numero=$_POST['numero'];
							$dt_nascimento=$_POST['dt_nascimento'];
							$descricao=$_POST['descricao'];
							$arquivo = $_FILES['arquivo'];
							$foto = $_FILES['foto'];
//----------------------------------------Foto------------------------------------------------
							if(!empty($foto['name'])){
									if(!preg_match("/^image\/jpg|jpeg|gif|png|bmp$/",$foto['type'])){
										echo('<script>window.alert("Arquivo não compativel!");window.location ="#";</script>');
									}else{
										preg_match("/\.(jpg|jpeg|bmp|gif|png){1}$/i", $foto["name"], $tipo);
										$nome_img = md5(uniqid(time())).'.'.$tipo[1];
										$caminho = "perfil/".$nome_img;
										move_uploaded_file($foto["tmp_name"], $caminho);
										$sql5 = 'UPDATE cadastro set foto="'.$caminho.'" where id_usuario='.$_SESSION['id'].';';
										$execut = mysqli_query($conexao,$sql5);
										if($execut){
											
										}else{
											
										}
									}
								}else{
									
								}


//-------------------------------------------- arquivo ----------------------------------------------------

							$padrao = array('.pdf');

							$extensao= strrchr($_FILES['arquivo'] ['name'], '.');

							if(in_array($extensao, $padrao)===false){
								
							}else{
								preg_match("/\.(pdf){1}$/i",$arquivo["name"],$ext);

								$nome_curriculo=sha1(uniqid(time())).'.'.$ext[1];
								$caminho="arquivo/".$nome_curriculo;
								move_uploaded_file($arquivo["tmp_name"], $caminho);
								$sql6 = 'UPDATE cadastro set arquivo="'.$caminho.'" where id_usuario='.$_SESSION[''].';';
								$execut = mysqli_query($conexao,$sql6);
							}
//-----------------------------------------------------------------------------							
						$sqlin = 'UPDATE cadastro set nome="'.$nome.'", usuario="'.$usuario.'", dt_nascimento="'.$dt_nascimento.'", email="'.$email.'", telefone="'.$telefone.'", cep="'.$cep.'" , uf="'.$uf.'", ibge="'.$ibge.'",  cidade="'.$cidade.'", bairro="'.$bairro.'", rua="'.$rua.'", numero="'.$numero.'", descricao="'.$descricao.'" where id_usuario='.$_SESSION['id'].';';

						$inserir= mysqli_query($conexao, $sqlin);	
						if($inserir){
							echo('<script>window.location="adm.php";</script>');
						}else{
							echo('<script>window.alert("Erro de alteração!");window.location="adm.php";</script>');
						}
					}
					?>
				</section>
			</section>
		</section>
		<?php
			}

		?>
		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>