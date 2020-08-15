<?php

class mvcController{
//Llamada Plantilla
//-----------------------------------
	public function plantilla(){

		include "views/template.php"; // include me permite agregar el archivo template

	}
//Interaccion del usuario
//-----------------------------------
	public function enlacesPaginasController(){

		if (isset($_GET ["action"])){                      //El controlador debe poder ejecutar la página principal (index en este caso), iseet pregunta si trae informacio en ese caso le da la instruccion de tomar esa info de la variable

			$enlaceControl = $_GET ["action"]; // las variables GET -> URL ---- se ejecutan con el signo de pregunta "?" ?action=..." no $ ... estas variables deben pasar por el controlador en este caso el nombre es action
		
		//echo $enlaceControl; // cuando hago el echo me devuelve el texto para hacer la interaccion con la pagina debo hacerlo atraves del modelo

		}

		else{
			$enlaceControl = "index"; //Debo hacer cambios en la modelo para reflejar este cambio
		}

		$respuesta = enlacePaginas::enlacePaginasModelo($enlaceControl);      //para ello creo una variable respuesta que va a devolver lo que arroje el modelo con en :: hereda la Class enlacePaginas y el metodo enlacePaginasModelo

		//para que haga lectura el controlador de la Class enlacePagina debe estar invocado en el index o en el mismo archivo controller, como puede ser util para otros controladores lo invoco desde el index

		include $respuesta;           
	}
}

?>