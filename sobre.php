<?php
	session_start();
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sobre</title>
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

		<section class="sobre container">

			<section>
				<p id="plataforma">O que nossa plataforma oferece?</p>
				<p>

					&emsp;&emsp; Os Objetivos de Desenvolvimento Sustentável (ODS) é uma agenda mundial adotada durante a Cúpula das Nações Unidas sobre o Desenvolvimento Sustentável em setembro de 2015 composta por 17 objetivos e 169 metas a serem atingidos até 2030. Para um melhor desenvolvimento a Good Hands buscou abordar uma das metas impostas pela ONU, onde será apresentada e detalhada, sendo ela:
					<br>
					&emsp;&emsp; ODS 3 - Assegurar uma vida saudável e promover o bem-estar para todos, em todas as idades.
					Essa ODS ira tratar da saúde física, da mortalidade, dos meios de tratamento para epidemias, doenças do corpo e metal. Iremos abordar aspectos como o planejamento familiar, a proteção e o acesso ao sistema de saúde para melhora qualidade de vida.
					Como meta a Good Hands utiliza a ODS 3.8 - Atingir a cobertura universal de saúde, incluindo a proteção do risco financeiro, o acesso a 29 serviços de saúde essenciais de qualidade e o acesso a medicamentos e vacinas essenciais seguros, eficazes, de qualidade e a preços acessíveis para todos.

					<br>
					&emsp;&emsp;A Good Hands é uma plataforma que busca conectar idosos e necessitados de atendimento em domicílio com cuidadores formados, na qual visa a facilidade de acesso em poucos cliques, já que por sua vez não terá nenhum tipo de complicação para a conexão com o cuidador.
					A empresa irá permitir que o cuidador tenha a opção de seu próprio salário, mas sempre tendo como base alguns serviços para que não haja uma desigualdade, o valor de seus serviços também irá depender de sua localidade e de seu histórico como cuidador/enfermeiro, recebendo através de uma conta poupança, onde o cliente irá depositar o valor na conta da empresa (Good Hands), na qual será descontado a porcentagem já combinada no ato do contrato, após isso irá ocorrer a transferência para a conta poupança já citada acima, no qual o cuidador irá ter livre acesso a mesma.<br>
					&emsp;&emsp;O cliente terá livre escolha de sua forma de pagamento e da escolha dos
					cuidadores, visto que, na plataforma vai conter um relatório dos serviços oferecidos e
					já realizados dos mesmos, assim tendo uma grande variação de preços, escolhendo
					o que melhor caber em seu orçamento. A plataforma busca oferecer trabalho para profissionais que em sua maioria estão desempregados e precisam de uma renda extra, adquirindo essas parcerias
					somente com um certificado de cuidador e/ou qualificação, assim visando a segurança dos clientes.
				</p>
			</section>
		</section>

		<section align="center">
			 <img src="img/logotipo.png" alt="Logo Good Hands" class="sobrenos"></a>
		</section>

		<section>
				<p id="desenvolvido">Desenvolvido por: </p>
		</section>
				
		<center>
			<section class="container desenvolvedores">
					<table style="display: inline; text-align: center">
						<tr>
							<td>
								<img src="img/gustavo.jpeg" alt="Gustavo Vaz" title="Gustavo Vaz" class="desenvolvedor">
							</td>
						</tr>
						<tr>
							<td>
								Gustavo Vaz
							</td>
						</tr>
					</table>
					<table style="display: inline; text-align: center">
						<tr>
							<td>
								<img src="img/murilo.jpeg" alt="Murilo Trevizol" title="Murilo Trevizol" class="desenvolvedor">
							</td>
						</tr>
						<tr>
							<td>
								Murilo Trevizol
							</td>
						</tr>
					</table>
		
					<table style="display: inline; text-align: center">
						<tr>
							<td>
								<img src="img/nathalia.jpeg" alt="Nathália Caroline" title="Nathália Caroline" class="desenvolvedor">
							</td>
						</tr>
						<tr>
							<td>
								Nathália Caroline
							</td>
						</tr>
					</table>
					<br>
					<table style="display: inline; text-align: center">
						<tr>
							<td>
								<img src="img/raissa.jpeg" alt="Raissa Reis" title="Raissa Reis" class="desenvolvedor">
							</td>
						</tr>
						<tr>
							<td>
								Raissa Reis
							</td>
						</tr>
					</table>
					<table style="display: inline; text-align: center">
						<tr>
							<td>
								<img src="img/thiagoa.jpeg" alt="Thiago Aparecido" title="Thiago Aparecido" class="desenvolvedor">
							</td>
						</tr>
						<tr>
							<td>
								Thiago Aparecido
							</td>
						</tr>
					</table>
					<table style="display: inline; text-align: center">
						<tr>
							<td>
								<img src="img/vinicius.jpeg" alt="Vinicius Santana" title="Vinicius Santana" class="desenvolvedor">
							</td>
						</tr>
						<tr>
							<td>
								Vinicius Santana
							</td>
						</tr>
					</table>
				
				<br>
			</section>
		</center>

		<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>

	</body>
</html>