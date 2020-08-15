<?php

class enlacePaginas{   //Las Clases conviene empezarlas con MAYUSCULA para identificarlas rapidamente

	public function enlacePaginasModelo($enlaceModel){ //el modelo debe validar

		if($enlaceModel == "ingresar" ||
		   $enlaceModel == "usuario" ||
		   $enlaceModel == "editar" ||
		   $enlaceModel == "salir"){

				$module ="views/modules/".$enlaceModel.".php"; //concateno con la variable para poder direccionar
		
		}

		else if($enlaceModel == "registro"){

			$module ="views/modules/ingresar.php"; //Tenego que acordarme de sacar la extension ?action de para que no la tome como una variable GET_
				
		}

		//else{

		//		$module ="views/modules/404error/web/404.html";

		//}

		else{									//Creo una lista blanca que bloquea otras ?action que pueda introducir el usuario de manera maliciosa. Podria armar una lista negra con las palabras que no estan permitidas pero es mas complicado

			$module ="views/modules/registro.php";

		}


		return $module;
	}



}
//si el archivo es solo PHP se recominda dejar abierto para evitar que alguien pueda agregar codigo malicioso


