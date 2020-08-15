<?php

require_once "conexion.php";

class ModeloFormularios{

	//---------------------------
	//Registro
	//---------------------------

	static public function mdlRegistro ($tabla, $datos){

	//	Creo una variable llamada statement o decaracion para poder hacer un apreparacion de sentencia SQL

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES (:usuario, :password, :email)"); //dentro de prepare pongo la sentencia de SQL en este caso es un INSERT, la tabla viene como parametro, en el caso de los VALUES deben estar ocultos para ello los defino con ":" es preciso tbn que utilice la funcion binParam()

		#bindParam() vincula una sentencia de PHP a un parametro de sustitucion, tiene tres parametros el nombre del parametro oculto, el segundo es el valor que le voy a enlazar el tercero es el tipo de dato. Esta es una medida de seguridad para proteger los datos

		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR); //el tipo de dato es un string
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			$token = ModeloFormularios::mdlCrearToken($tabla, "email", $datos["email"]);

			return $token;

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close(); //si llegase a haber un error en la conexion por buena practica corresponde cerrar la conexion a la DB

		$stmt = NULL; // vacio la informacion que haya quedado en la variable


		
	} 

	static public function mdlConsultaTabla($tabla, $columna, $valor){

		//$consulta = Conexion::conectar()->prepare("SELECT usuario, email, fecha_registro FROM $tabla"); CAMBIO FORMATO FECHA REGISTRO
		
		if ($columna == NULL && $valor == NULL){

			$consulta = Conexion::conectar()->prepare("SELECT id, usuario, email, DATE_FORMAT(fecha_registro, '%d - %b - %Y') AS fecha_registro FROM $tabla ORDER BY id DESC");

				if($consulta->execute()){//Este if execute se puede sacar

					return $consulta -> fetchAll(); // devuelvo la consulta con la funcion fetchAll() asi devuelve todos los registros

				}else{

					print_r(Conexion::conectar()->errorInfo());

				}

			}else {

				$consulta = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha_registro, '%d - %b - %Y') AS fecha_registro FROM $tabla WHERE $columna = :$columna ORDER BY id DESC");	

				$consulta -> bindParam(":".$columna/*el "."concatena con el valor de la columna*/, $valor, PDO::PARAM_STR);

				$consulta -> execute();

				return $consulta -> fetch();

			}

		$consulta -> close(); //si llegase a haber un error en la conexion por buena practica corresponde cerrar la conexion a la DB

		$consulta = NULL;

		}

	static public function mdlEditar ($tabla, $datos){

	//	Creo una variable llamada statement o decaracion para poder hacer un apreparacion de sentencia SQL

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, email=:email WHERE id=:id");  

		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR); //el tipo de dato es un string
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);//En este caso el parametro es INT

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close(); //si llegase a haber un error en la conexion por buena practica corresponde cerrar la conexion a la DB

		$stmt = NULL; // vacio la informacion que haya quedado en la variable


		
	}


	static public function mdlBorrarRegistro($tabla, $datos){

	//	Creo una variable llamada statement o decaracion para poder hacer un apreparacion de sentencia SQL

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id= $datos");  

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);//En este caso el parametro es INT

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close(); //si llegase a haber un error en la conexion por buena practica corresponde cerrar la conexion a la DB

		$stmt = NULL; // vacio la informacion que haya quedado en la variable


		
	}

	////////////////////////////////////
	// CREAR TOKEN
	////////////////////////////////////

	static public function mdlCrearToken($tabla, $columna, $email){

		$consulta = ModeloFormularios::mdlConsultaTabla($tabla, $columna, $email);

		$token =  md5($consulta["email"]."+".$consulta["id"]."+".$consulta["fecha_registro"]);

		//echo '<pre>'; print_r($token); echo '<pre>';

		$regToken = Conexion::conectar()->prepare("UPDATE $tabla SET token='$token' WHERE email='$email'");

		$regToken -> bindParam(":token", $token, PDO::PARAM_STR);

		if ($regToken -> execute()){

			return "ok";

		};

		//}
	} 


//ALTERNATIVA LLAMAR UN METODO DISTINTO
/*	static public function mdlIngresoSistema($tabla, $columna, $login){

		$consulta = Conexion::conectar()->prepare("SELECT $columna FROM $tabla WHERE $columna = :$columna");

		$consulta -> bindParam(":".$columna, $login, PDO::PARAM_STR);

		$consulta -> execute();		

		return $consulta -> fetch();
		
	}*/


}
//si el archivo es solo PHP se recominda dejar abierto para evitar que alguien pueda agregar codigo malicioso
?>