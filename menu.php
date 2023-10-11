<?php
	include('conexao.php');
	if(!isset($_SESSION['conf'])){
		?>
		<header class="navbar navbar-expand-lg navbar-light" style="background: #FFE4E1;">
			<section>
				<a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="Logo" class="logo"></a>
			</section>

			<button class="menu navbar-toggler bg-light dropright" type="button" data-toggle="collapse" data-target="#navbarSites" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<nav class="collapse navbar-collapse" id="navbarSites">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="index.php" class="links" style="margin-left: 20px; font-size: 20px;">Home</a>
					</li>
					<li class="nav-item">
						<a href="profissionais.php" class="links" style="font-size: 20px;">Profissionais</a>
					</li>
					<li class="nav-item">
						<a href="sobre.php" class="links" style="font-size: 20px;">Sobre</a>
					</li>
				</ul>
			</nav>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle links" style="font-size: 20px;" href="#" data-toggle="dropdown"id="navDrop">Categoria</a>
						<div class="dropdown-menu">
							<a href="profissionais.php?categoriaa=true&categoria=todos" class="dropdown-item">Todos</a>
						
							<?php
							
								$sql1 = 'select * from especificacao;';
								$banc = mysqli_query($conexao, $sql1);
								while($vec_registro = mysqli_fetch_array($banc)){
									?>
										<a href="profissionais.php?categoriaa=true&categoria=<?php echo($vec_registro['nome_especificacao']); ?>" class="dropdown-item"><?php echo($vec_registro['nome_especificacao']); ?></a>
							<?php
								}
							
							?>
						</div>
					</li>
				</ul>

				<section class="pesq">
					<form name="pesquisa" method="POST" action="profissionais.php" class="form-inline" style="margin-right: 20px;">
						<input type="text" name="pesquisa" class="pesquisar" placeholder="Pesquisar">
						<input type="submit" name="Pesquisar" value="Pesquisar" class="pesquisa">
					</form>
				</section>
			<a href="login.php"><img src="img/login.png" alt="login" title="Login" class="pessoa login"></a>
			<a href="cadastro.php"><img src="img/cadastro.png" alt="cadastro" title="Cadastro" class="pessoa cad"></a>
		</header>

<?php
	}else{
		if($_SESSION['categoria']=='adm'){
?>
	
		<header class="navbar navbar-expand-lg navbar-light" style="background: #FFE4E1;">
			<section>
				<a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="Logo" class="logo"></a>
			</section>

			<button class="menu navbar-toggler bg-light dropright" type="button" data-toggle="collapse" data-target="#navbarSites" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<nav class="collapse navbar-collapse" id="navbarSites">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="index.php" class="links" style="margin-left: 20px; font-size: 20px;">Home</a>
					</li>
					<li class="nav-item">
						<a href="profissionais.php" class="links" style="font-size: 20px;">Profissionais</a>
					</li>
					<li class="nav-item">
						<a href="lista_msg.php" class="links" style="font-size: 20px;">Mensagens</a>
					</li>
				
					<li class="nav-item">
						<a href="adm.php" class="links" style="font-size: 20px;">ADM</a>
					</li>
				</ul>
			</nav>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle links" style="font-size: 20px;" href="#" data-toggle="dropdown"id="navDrop">Categoria</a>
						<div class="dropdown-menu">
							<a href="profissionais.php?categoria=true&categoria=todos" class="dropdown-item">Todos</a>
						
							<?php
							
								$sql1 = 'select * from especificacao;';
								$banc = mysqli_query($conexao, $sql1);
								while($vec_registro = mysqli_fetch_array($banc)){
									?>
										<a href="profissionais.php?categoria=true&categoria=<?php echo($vec_registro['nome_especificacao']); ?>" class="dropdown-item"><?php echo($vec_registro['nome_especificacao']); ?></a>
							<?php
								}
							
							?>
						</div>
					</li>
				</ul>
				<section class="pesq" >
					<form name="pesquisa" method="POST" action="profissionais.php" class="form-inline" style="margin-right: 20px;">
						<input type="text" name="pesquisa" class="pesquisar" placeholder="Pesquisar">
						<input type="submit" name="Pesquisar" value="Pesquisar" class="pesquisa">
					</form>
				</section>

				<?php
					if(isset($_SESSION['id_user'])){
						$sql = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
						$banc = mysqli_query($conexao,$sql);
						$resul = mysqli_fetch_array($banc);
						if(!$resul['foto']){
							echo('<a href="login.php"><img src="img/usuario.jpg" alt="login" class="pessoa login" style="border-radius: 100px;"></a>');
						}else{
							echo('<a href="login.php"><img src="'.$resul['foto'].'" alt="login" class="pessoa login" style="border-radius: 100%;"></a>');
						}
					}else{
						echo('<a href="login.php"><img src="img/usuario.jpg" alt="login" class="pessoa login" style="border-radius: 100px;"></a>');
					}
				?>
		</header>
		
<?php
		}else{
?>
		<header class="navbar navbar-expand-lg navbar-light" style="background: #FFE4E1;">
			<section>
				<a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="Logo" class="logo"></a>
			</section>

			<button class="menu navbar-toggler bg-light dropright" type="button" data-toggle="collapse" data-target="#navbarSites" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<nav class="collapse navbar-collapse" id="navbarSites">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="index.php" class="links" style="margin-left: 20px; font-size: 20px;">Home</a>
					</li>
					<li class="nav-item">
						<a href="profissionais.php" class="links" style="font-size: 20px;">Profissionais</a>
					</li>
					<li class="nav-item">
						<a href="lista_msg.php" class="links" style="font-size: 20px;">Mensagens</a>
					</li>
					<li class="nav-item">
						<a href="sobre.php" class="links" style="font-size: 20px;">Sobre</a>
					</li>
				</ul>
			</nav>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle links" style="font-size: 20px;" href="#" data-toggle="dropdown"id="navDrop">Categoria</a>
						<div class="dropdown-menu">
							<a href="profissionais.php?categoriaa=true&categoria=todos" class="dropdown-item">Todos</a>
						
							<?php
							
								$sql1 = 'select * from especificacao;';
								$banc = mysqli_query($conexao, $sql1);
								while($vec_registro = mysqli_fetch_array($banc)){
									?>
										<a href="profissionais.php?categoriaa=true&categoria=<?php echo($vec_registro['nome_especificacao']); ?>" class="dropdown-item"><?php echo($vec_registro['nome_especificacao']); ?></a>
							<?php
								}
							
							?>
						</div>
					</li>
				</ul>

			<section class="pesq" >
				<form name="pesquisa" method="POST" action="profissionais.php" class="form-inline" style="margin-right: 20px;">
					<input type="text" name="pesquisa" class="pesquisar" placeholder="Pesquisar">
					<input type="submit" name="Pesquisar" value="Pesquisar" class="pesquisa">
				</form>
			</section>

			<?php
					if(isset($_SESSION['id_user'])){
						$sql = 'select * from cadastro where id_usuario='.$_SESSION['id_user'].';';
						$banc = mysqli_query($conexao,$sql);
						$resul = mysqli_fetch_array($banc);
						if(!$resul['foto']){
							echo('<a href="login.php"><img src="img/usuario.jpg" alt="login" class="pessoa login" style="border-radius: 100px;"></a>');
						}else{
							echo('<a href="login.php"><img src="'.$resul['foto'].'" alt="login" class="pessoa login" style="border-radius: 100%;"></a>');
						}
					}else{
						echo('<a href="login.php"><img src="img/usuario.jpg" alt="login" class="pessoa login" style="border-radius: 100px;"></a>');
					}
				?>
				
		</header>
<?php
		}
	}
?>
