<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<meta charset="utf-8">
	<head>
		<title>Cadastro do Cuidador</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/jquery.mask.min.js"></script>
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

	<script type="text/javascript">
		
	</script>

	</head>
	<body>
		<?php
			include('menu.php');
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="Login" method="POST" action="#" enctype="multipart/form-data">
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Cadastrar Cuidador</h4>
							
							<div class="form-group">
							    <label for="nome" class="text-light corlink">Nome:</label>
							    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" required>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="usuario" class="text-light corlink">Usuário:</label>
							      	<input type="text" name="usuario" class="form-control" id="usuario" required>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="senha" class="text-light corlink">Senha:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1"><img src="img/cadeado.png" style="width: 15px; height: auto;"></span>
								      	<input type="password" name="senha" class="form-control" id="senha" required="">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="email" class="text-light corlink">E-mail:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1"><img src="img/arroba.png" style="width: 15px; height: auto;"></span>
								      	<input type="email" name="email" class="form-control" id="email" required>
								     </div>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="telefone" class="text-light corlink">Telefone:</label>
							      	<input type="text" name="telefone" class="form-control" id="telefone" placeholder="(XX)X XXXX-XXXX" onkeypress="$(this).mask('(00)0 0000-0000')" maxlength="11">
							    </div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
							      	<label for="cpf" class="text-light corlink">CPF:</label>
							      	<input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00')" maxlength="11" required>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="dt_nascimento" class="text-light corlink">Data de Nascimento:</label>
							      	<div class="input-group mb-3">
								      	<input type="date" name="dt_nascimento" class="form-control" id="dt_nascimento" required>
								     </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">CEP:</label>
							      	<input type="text" name="cep" class="form-control" value="" id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" onkeypress="$(this).mask('00000-000')" maxlength="8" required>
							    </div>
							    
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">Estado:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="uf" class="form-control" id="uf" placeholder="Estado" required>
								    </div>
							    </div>
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">IBGE:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="ibge" class="form-control" id="ibge">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink">Cidade:</label>
							      	<input type="text" name="cidade" class="form-control" value="" id="cidade" placeholder="Cidade" required>
							    </div>
							    
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink">Bairro:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" required>
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
							      	<label class="text-light corlink">Rua:</label>
							      	<input type="text" name="rua" class="form-control" value="" id="rua" placeholder="Rua">
							    </div>
							    
							    <div class="form-group col-md-4">
							      	<label class="text-light corlink">N°:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="numero" class="form-control" id="numero" placeholder="Numero da casa">
								    </div>
							    </div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-5">
							      	<label for="coren" class="text-light corlink">Coren:</label>
							      	<input type="text" name="coren" class="form-control" id="coren" placeholder="Coren">
							    </div>
							    	<div class="form-group col-md-4">
							    		<ul class="navbar-nav ml-auto">
											<li class="nav-item dropdown">
												<label for="categoria" class="text-light corlink">Especificação:</label>
													<a class="nav-link dropdown-toggle text-light fonte corlink" href="#" data-toggle="dropdown"id="navDrop">Escolha sua Categoria</a>
												<div class="dropdown-menu">
													<a href="#mensagem" class="dropdown-item">Nenhuma das alternativas ou deseja criar mensagem personalizada.</a>

													<?php
														$sqll = 'select * from especificacao;';
														$ex = mysqli_query($conexao,$sqll);
														while($result = mysqli_fetch_array($ex)){
													?>

															<div class="dropdown-item">
																<input type="checkbox" name="<?php echo($result['nome_especificacao']); ?>" value="<?php echo($result['nome_especificacao']); ?>"> <?php echo($result['nome_especificacao']); ?>
															</div>

													<?php
														}
													?>

												</div>
											</li>
										</ul>
									</div>
									<div class="form-group col-md-3">
										<label for="categoria" class="text-light corlink">Adicionar Nova Espeifiação:</label>
										<a href="adicionar_especificacao.php" class="form-control" style="text-align: center">+</a>
									</div>
							</div>
							<div class="form-group">
							    <label for="nome" class="text-light corlink">Currículo:</label>
							    <input type="file" name="arquivo" class="form-control" id="nome" placeholder="Currículo" required>
							</div>

							<div align="center">
								<button type="submit" name="Cadastrar" value="Cadastrar" class="bot" style="margin-bottom: 10px;">Cadastrar</button><br>
							<a href="cadastro.php" class="corlink text-light">Voltar</a>
						</div>
					</form>
					<?php
						if(isset($_POST['Cadastrar'])){

							$nome=$_POST['nome'];
							$usuario=$_POST['usuario'];
							$senha=sha1(trim($_POST['senha']));
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
							$coren=$_POST['coren'];
							$arquivo = $_FILES['arquivo'];

//------------------------------------ arquivo----------------------------------------------------

							$padrao = array('.pdf');

							$extensao= strrchr($_FILES['arquivo'] ['name'], '.');

							if(in_array($extensao, $padrao)===false){
								echo('<script>window.alert("Todos os arquivos de documentação, fora a foto de perfil, devem estar em PDF.");</script>');
							}else{
								preg_match("/\.(pdf){1}$/i",$arquivo["name"],$ext);

								$nome_curriculo=sha1(uniqid(time())).'.'.$ext[1];
								$caminho="arquivo/".$nome_curriculo;
								move_uploaded_file($arquivo["tmp_name"], $caminho);

//---------------------------------------------------------------------------
								$sqlin= 'insert into cadastro(nome, usuario, senha, email, cep, uf, ibge, cidade, bairro, rua, numero, telefone, dt_nascimento, coren, arquivo, categoria) values ("'.$nome.'", "'.$usuario.'", "'.$senha.'", "'.$email.'", "'.$cep.'", "'.$uf.'", "'.$ibge.'", "'.$cidade.'", "'.$bairro.'", "'.$rua.'", "'.$numero.'","'.$telefone.'", "'.$dt_nascimento.'", "'.$coren.'", "'.$nome_curriculo.'","cuidador");'; 
								$inserir= mysqli_query($conexao, $sqlin);	
								if($inserir){

									$sql = 'select * from cadastro where usuario = "'.$usuario.'" and senha = "'.$senha.'";';
									$resul = mysqli_query($conexao,$sql);
									$conf = mysqli_fetch_array($resul);

									$sqll = 'select * from especificacao;';
									$ex = mysqli_query($conexao,$sqll);
									while($result = mysqli_fetch_array($ex)){

										if(isset($_POST[$result['nome_especificacao']])){
											$escolha = $_POST[$result['nome_especificacao']];
											$sql = 'insert into registro_especificacao (nome_especificacao, id_usuario) values ("'.$escolha.'",'.$conf['id_usuario'].');';
											$banc = mysqli_query($conexao,$sql);
											if($banc){

											}
										}
									}

									echo('<script>window.alert("Cadastro realizado com sucesso!");window.location="login.php";</script>');
								
								}else{
									echo('<script>window.alert("Erro ou falha ao cadastrar!");</script>');
								}						
							}	
						}
					?>
				</section>
			</section>
		</section>

		<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>