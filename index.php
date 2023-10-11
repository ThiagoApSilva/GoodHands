<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Good Hands - A maior aliada da sua saúde</title>
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

		<main class="container conteudo">

			<section class="distancia">			
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="img/img1.jpeg" class="d-block w-100" alt="Baner">
				    </div>
				    <div class="carousel-item">
				      <img src="img/img2.jpeg" class="d-block w-100" alt="Baner2">
				    </div>
				    <div class="carousel-item">
				      <img src="img/img3.jpeg" class="d-block w-100" alt="Baner3">
				    </div>
				    <div class="carousel-item">
				      <img src="img/img4.jpeg" class="d-block w-100" alt="Baner4">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</section>
<br><br>
			<section id="paragrafo">
				<h2>Tudo que você precisa saber</h2>
				<p>
					&emsp;&emsp; O aumento na expectativa de vida dos brasileiros é uma conquista que revela avanços nas pesquisas científicas, nos serviços de saúde, maior conscientização da população e cuidados básicos com a qualidade de vida <a href="#cont"><b>Continue...</b></a>
				</p>
			</section>
			<br><br>
			<section style=" text-align: center;" class="embed-responsive embed-responsive-16by9">
				<video src="img/video.mp4" controls class="embed-responsive-item" />
			</section>
<br><br>
			<section class="centralizar">
				<span>
					<a href="https://redepara.com.br/Noticia/215748/hospital-galileu-da-dicas-essenciais-para-a-saude-do-idoso" target="_blank"><img src="img/dicas.jpeg" alt="Dicas essenciais para a saúde do idoso" class="quadros"></a>

					<a href="https://www.psicologoeterapia.com.br/blog/a-depressao-em-idosos-dicas-de-como-cuidar/" target="_blank"><img src="img/depressao.jpeg" alt="Como acabar com a depresão" class="quadros"></a>

					<a href="https://www.terra.com.br/noticias/dino/novos-tempos-exigem-tecnologias-inovadoras-para-cuidar-de-idosos-pos-pandemia,f7ad155dfa0ae3a37c0da11e5f332f2fbot3udjv.html" target="_blank"><img src="img/pandemia.jpeg" alt="Cuidados com idosos pós pandemia" class="quadros"></a>
				</span>
			</section>

			<section class="distancia">			
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <a href="profissionais.php"><img src="img/banner.jpeg" class="d-block w-100" alt="Banner"></a>
				    </div>
				    <div class="carousel-item">
				      <img src="img/banner2.jpeg" class="d-block w-100" alt="Banner2">
				    </div>
				    <div class="carousel-item">
				      <a href="sobre.php"><img src="img/banner3.jpeg" class="d-block w-100" alt="Banner3"></a>
				    </div>
				    <div class="carousel-item">
				      <a href="https://odsbrasil.gov.br/"><img src="img/banner4.jpeg" class="d-block w-100" alt="Banner4"></a>
				    </div>
				  </div>
				  
				</div>
			</section>
			<br><br>
			<a name="cont"></a>
			<section id="paragrafo">
				<h2>Tudo que você precisa saber</h2>
				<p>
					&emsp;&emsp; O aumento na expectativa de vida dos brasileiros é uma conquista que revela avanços nas pesquisas científicas, nos serviços de saúde, maior conscientização da população e cuidados básicos com a qualidade de vida.
					Apesar de cada pessoa ter uma necessidade diferente, existem casos em que é fundamental a presença do profissional, principalmente para quem sofre de doenças crônicas ou tem dificuldades para se locomover, tão quanto esquecimentos para situações importantes, como a hora correta de se medicar.
					O cuidador de idosos é uma excelente alternativa para auxiliar as pessoas da terceira idade no dia a dia. Além da companhia, os profissionais têm formações na área de enfermagem e primeiros socorros, sendo bem úteis na promoção e cuidados de saúde.
					Além de ministrar corretamente as medicações, o cuidador de idosos ajuda na higiene pessoal, com as refeições, acompanha o paciente nas consultas, faz passeios e também um atendimento especial caso a pessoa esteja acamada.<br>
					Para saber mais <span> <a href="https://comunicareaparelhosauditivos.com/informacoes-sobre-cuidador-de-idosos/" target="_blank">clique aqui.</a></span>
				</p>
			</section>

		</main>
<br>
		<footer>
			<?php
				include('rodape.php');
			?>
			<script src="js/bootstrap.bundle.min.js"></script>
		</footer>
	</body>
</html>