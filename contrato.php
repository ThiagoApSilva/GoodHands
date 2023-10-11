<?php
	session_start();
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
		<script src="js/jquery.mask.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		<script type="text/javascript" >
    
    		function limpa_formulário_cep() {
	            //Limpa valores do formulário de cep.
	            document.getElementById('rua').value=("");
	            document.getElementById('bairro').value=("");
	            document.getElementById('cidade').value=("");
	            document.getElementById('uf').value=("");
	            
    		}

		    function meu_callback(conteudo) {
		        if (!("erro" in conteudo)) {
		            //Atualiza os campos com os valores.
		            document.getElementById('rua').value=(conteudo.logradouro);
		            document.getElementById('bairro').value=(conteudo.bairro);
		            document.getElementById('cidade').value=(conteudo.localidade);
		            document.getElementById('uf').value=(conteudo.uf);
		            
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
			include('menu.php');
			$sql = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
			$banc = mysqli_query($conexao, $sql);
			$resul = mysqli_fetch_array($banc);

			$sql1 = 'select * from previa_contrato where id_cliente='.$_SESSION['id_user'].' and id_cuidador='.$_SESSION['cuid_msg'].';';
			$banc1 = mysqli_query($conexao, $sql1);
			$resul1 = mysqli_fetch_array($banc1);

			$sql2 = 'select * from cadastro where id_usuario='.$resul1['id_cuidador'].';';
			$banc2 = mysqli_query($conexao, $sql2);
			$resul2 = mysqli_fetch_array($banc2);
			
		?>
		<section class="container">
			<section class="pglogin">
				<section style="background-color: rgba(255, 153, 204, 1); padding: 20px; border-radius: 20px;">
					<form name="Login" method="POST" action="#" enctype="multipart/form-data">
						<h4 align="center" class="text-light" style="font-family: Berlin Sans FB">Contrato</h4>
							
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="usuario" class="text-light corlink">Usuário:</label>
							      	<input type="text" name="usuario" class="form-control" id="usuario" required placeholder="Confirme seu usuario">
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="senha" class="text-light corlink">Senha:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1"><img src="img/cadeado.png" style="width: 15px; height: auto;"></span>
								      	<input type="password" name="senha" class="form-control" id="senha" required placeholder="Confime sua senha">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label for="email" class="text-light corlink">E-mail:</label>
							      	<div class="input-group mb-3">
								      	<span class="input-group-text" id="basic-addon1"><img src="img/arroba.png" style="width: 15px; height: auto;"></span>
								      	<input type="email" name="email" class="form-control" value="<?php echo($resul['email']); ?>" id="email"  required>
								     </div>
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="telefone" class="text-light corlink">Telefone:</label>
							      	<input type="text" name="telefone" value="<?php echo($resul['telefone']); ?>" class="form-control" id="telefone" placeholder="(XX)X XXXX-XXXX" onkeypress="$(this).mask('(00)0 0000-0000')" maxlength="11">
							    </div>
							</div>
							<div class="form-group">
							    <label for="nome" class="text-light corlink">Nome:</label>
							    <input type="text" name="nome" class="form-control" value="<?php echo($resul['nome']); ?>" id="nome" placeholder="Nome Completo" required>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
							      	<label for="nun_cad" class="text-light corlink">Numero do Cartão:</label>
							      	<div class="input-group mb-3">
								      	<input type="text" name="nun_cad" class="form-control" id="nun_cad" required onkeypress="$(this).mask('0000.0000.0000.0000')" placeholder="0000.0000.0000.0000">
								     </div>
							    </div>
								<div class="form-group col-md-3">
							      	<label for="cpf" class="text-light corlink">CPF do Titular:</label>
							      	<input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00')" maxlength="14" required>
							    </div>
							    <div class="form-group col-md-4">
							      	<label for="dt_vencimento" class="text-light corlink">Data de vencimento do Cartão:</label>
							      	<div class="input-group mb-3">
								      	<input type="text" name="dt_vencimento" class="form-control" id="dt_vencimento" required onkeypress="$(this).mask('00/0000')" placeholder="mês/ano">
								     </div>
							    </div>
							    <div class="form-group col-md-2">
							      	<label for="cvv" class="text-light corlink">CVV:</label>
							      	<input type="text" name="cvv" class="form-control" id="cvv" placeholder="CVV" maxlength="3" required>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-2">
							      	<label class="text-light corlink">CEP:</label>
							      	<input type="text" name="cep" class="form-control" value="" id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" onkeypress="$(this).mask('00000-000')" maxlength="8" required>
							    </div>
							    
							    <div class="form-group col-md-5">
							      	<label class="text-light corlink">Estado:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="uf" class="form-control" id="uf" placeholder="Estado" required>
								    </div>
							    </div>
							    <div class="form-group col-md-5">
							      	<label class="text-light corlink">Cidade:</label>
							      	<input type="text" name="cidade" class="form-control" value="" id="cidade" placeholder="Cidade" required>
							    </div>
							    
							</div>
							<div class="form-row">
							    <div class="form-group col-md-5">
							      	<label class="text-light corlink">Bairro:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" required>
								    </div>
							    </div>
							    <div class="form-group col-md-5">
							      	<label class="text-light corlink">Rua:</label>
							      	<input type="text" name="rua" class="form-control" value="" id="rua" placeholder="Rua">
							    </div>
							    <div class="form-group col-md-2">
							      	<label class="text-light corlink">N°:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="numero" class="form-control" id="numero" placeholder="Numero da casa">
								    </div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							      	<label class="text-light corlink" for="profissional">Nome do Profissional:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" name="profissional" class="form-control" id="profissional" placeholder="Nome do profissonal" value="<?php echo($resul2['nome']); ?>" readonly required>
								    </div>
							    </div>
							    <div class="form-group col-md-3">
							      	<label class="text-light corlink" for="valor">Valor:</label>
							      	<input type="text" value="<?php echo($resul1['valor']); ?>" readonly name="valor" class="form-control" id="valor" placeholder="Valor">
							    </div>
							    <div class="form-group col-md-3">
							      	<label class="text-light corlink" for="horas">Horas:</label>
							      	<div class="input-group mb-3">							      	
								      	<input type="text" readonly value="<?php echo($resul1['tempo']); ?>" name="hora" class="form-control" id="horas" placeholder="horas">
								    </div>
							    </div>
							</div>
							<div align="center">
								<button type="submit" name="Cadastrar" value="Cadastrar" class="bot" style="margin-bottom: 10px;">Cadastrar</button><br>
							<a href="mensagens.php" class="corlink text-light">Voltar</a>
						</div>
					</form>
					<?php
						if(isset($_POST['Cadastrar'])){
							$usuario = $_POST['usuario'];
							$senha=sha1(trim($_POST['senha']));
							$email = $_POST['email'];
							$telefone = $_POST['telefone'];
							$nome = $_POST['nome'];
							$numero_cartao = $_POST['nun_cad'];
							$cpf = $_POST['cpf'];
							$dt_vencimento = $_POST['dt_vencimento'];
							$cvv = $_POST['cvv'];
							$cep = $_POST['cep'];
							$uf = $_POST['uf'];
							$cidade = $_POST['cidade'];
							$bairro = $_POST['bairro'];
							$rua = $_POST['rua'];
							$numero = $_POST['numero'];
							$profissional = $_POST['profissional'];
							$valor = $_POST['valor'];
							$hora = $_POST['hora'];

							$sql = 'select * from cadastro where usuario = "'.$usuario.'" and senha = "'.$senha.'";';
							$resul = mysqli_query($conexao,$sql);
							$conf = mysqli_fetch_array($resul);
							if(mysqli_num_rows($resul)){

								$sql5 = 'insert into contrato (email, telefone, nome, numero_cartao, cpf, dt_vencimento, cvv, cep, uf, cidade, bairro, rua, numero, profissional, valor, hora) values ("'.$email.'","'.$telefone.'","'.$nome.'","'.$numero_cartao.'","'.$cpf.'","'.$dt_vencimento.'",'.$cvv.',"'.$cep.'","'.$uf.'","'.$cidade.'","'.$bairro.'","'.$rua.'",'.$numero.',"'.$profissional.'","'.$valor.'","'.$hora.'");';
								$banc5 = mysqli_query($conexao, $sql5);
								if($banc5){
									echo('<script>window.alert("contrato realizado com sucesso");window.location="mensagens.php";</script>');
								}else{
									echo('<script>window.alert("erro ao contratar");</script>');
								}
							}else{
								echo('<script>window.alert("usuario ou senha incorretos");window.location="#";</script>');
							}
						}
					?>
				</section>
			</section>
		</section>
		
		<footer>
			<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
	</body>
</html>