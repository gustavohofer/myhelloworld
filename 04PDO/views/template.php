<?php

	session_start();

?>


<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Para poder usar BootStrap, le defino al navegador los puntos de quiebre de pantalla-->

	<title>Document</title>


	<!-- ****************
			PLUGINS CSS 
		****************-->

	<!-- ARCHIVOS FRAMEWORK BOOTSTRAP Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> <!--BootStrap-->

		
		<!-- ****************
				PLUGINS JS 
			 ****************-->

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!--BootStrap-->

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> <!--BootStrap-->

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> <!--BootStrap-->

		<!-- Latest compiled FontAwesome -->
		<script src="https://kit.fontawesome.com/e632f1f723.js"></script> <!--FontAwesome-->

	
	<!--<style type="text/css">
		header {
			position: relative;
			margin: auto;
			border-width: 1px; 
			border: solid; 
			text-align: center;
			padding: 5px;
		}
		nav {
			position: relative;
			margin: auto;
			width: 100%;
			height: auto;
			background: black;
		}
		nav ul{
			position: relative;
			text-align: center;
			margin: auto;
			width: 50%;
			text-align: center;
		}
		nav ul li{
			position: relative;
			text-align: center;
			display: inline-block;
			width: 24%;
			line-height: 50px;
			list-style: none;
		}
		nav ul li a{
			position: relative;
			text-align: center;
			color: white;
			text-decoration: none;
		}
	</style>-->
</head>
<body>
	
<header>
	<div class="container-fluid p-4 my-2 bg-dark text-center text-white">
		<h1>LOGOTIPO</h1>
	</div>
</header>

<?php
	include "modules/navegation.php";
?>

<section>

<?php
	$mvc2 = new mvcController();			//Creo una variable de objeto que llame a las distintas paginas
	$mvc2 -> enlacesPaginasController();
?>
	
</section>


</body>
</html>