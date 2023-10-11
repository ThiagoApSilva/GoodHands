<?php
	if(!isset($_SESSION['conf'])){
		unset($_SESSION['conf']);
		echo('<script>window.alert("Por favor, logue em sua conta ou crie uma para ter acesso!!!");window.location="login.php";</script>');
		exit;
	}
?>