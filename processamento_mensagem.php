<?php

include('conexao.php');
			$sql3 = 'select * from chat where msg="'.$_SESSION['nome_chat'].'";';
			$banc3 = mysqli_query($conexao, $sql3);
			if($banc3){
				
		?>
				<section>
					<div style="overflow: auto; width: 300px; height: 200px;">
						<table width="270" >
							<?php
								while ($res10 = mysqli_fetch_array($banc3)) {
									if($res10['envio']==$_SESSION['id_user']){
										?>
										<tr>
											<td style="color: #000; background-color: #FFE4E1"><?php echo($res10['conversa']); ?><br></td>
										</tr>
										<?php
									}else{
										?>
										<tr>
											<td style="color: #000;" align="right"><?php echo($res10['conversa']); ?><br></td>
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
					<div style="overflow: auto; width: 300px; height: 100px;">
						<table width="250" bgcolor="#000">
							<tr>
								<td style="color: #000;">Nenhuma mensagem foi enviada ainda!</td>
							</tr>
						</table>
					</div>
			<?php
				}
			?>