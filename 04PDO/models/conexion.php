<?php

Class Conexion{

	static public function conectar(){ // static 

		//argumentos de PDO("nombre del servidor; base de datos", "usuario", "contrasena") encapsuloo la conexion que se hace a la base de datos

		$link = new PDO("mysql:host=127.0.0.1;dbname=04pdomailing","root",""); //tambien puedo llamar al host por su nombre	
		//el nombre de la DB debe estar en minuscula y sin espacios
		//el nombre de las columnas no debe ser igual al de la tabla, no usar mayusculas no iniciar con numeros y no usar guion medio solo guion baj ara separar palabras tampoco usar caracteres latinos
		//la primer columna debe ser el ID tener presente que debe ser autoincremental para no tener problemas de registro automático. El ID es el identificadr de cada serie de datos, es único e irrepetible sirve para poder busar ordenar la tabla
		// El vaor predeterminado NULL se utilizado cuando al momento de la carga de datos los valores pueden quedar vacios

		$link -> exec("set names utf8");      //funcion ejecutar utf8 reconoce caracteres latinos





		return $link; 
	}
}


?>