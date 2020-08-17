<?php

class ControladorFormularios{

	//---------------------------
	//Registro
	//---------------------------

	static public function ctrRegistro(){ //Los metodos static basicamente sirven para reutilizar la informacion que se presenta en la vista deben instanciarse de una manera diferente

		if(isset($_POST["nombreRegistro"])){    // Las variables POST son como las variables GET con a diferencia que la informacion no puede ser vista por nadie es privada, en la variable GET sera vista en el navegador. Para identificar la variable POST en el HTML se utiliza el atributo name="", este atributo debe ir en todos los imputs que enviaran variables POST. Ademas el formulario debe ser definido en el HTML con el atributo method="post"


			if(preg_match('/^[a-zA-ZñÑáéíóú ÁÉÍÓÚ]+$/', $_POST["nombreRegistro"]) && 
			   preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $_POST["emailRegistro"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["contrasenaRegistro"])){ //la validacion preg_match sirve para evitaar ataques a la base de datos con caracteres especiales usados en JS. En el patron deb poner las "expresiones regulares PHP" para ello en el primer parametro dentro de los corchetes de la definicion '/^[ACA]+$/' pongo las expresiones regulares

				$tabla = "usuarios"; //debo poner el nombre de la tabla que genere en la base de datos

				$encriptarPass = crypt($_POST["contrasenaRegistro"], '$2a$07$Milanesa.Napolitana.con.Papas.Fritas$');

				$datos = array("usuario" => $_POST["nombreRegistro"],
							   "password" => $encriptarPass,
							   "email" => $_POST["emailRegistro"]); //los datos los voy a pasar con un array con propiedades y valores, tiene que ser los mismos titulos que en la base de datos

				if(ModeloFormularios::mdlConsultaTabla($tabla, "email", $_POST["emailRegistro"]) == ""){

					$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

					return $respuesta;

				}else{

				$respuesta = "error1";

				return $respuesta;};

				//echo $_POST["nombreRegistro"]."<br>".$_POST["emailRegistro"]."<br>".$_POST["contrasenaRegistro"];

				//return "ok"; linea de prueba para ver si llama al metodo

			}else{

				$respuesta = "error";

				return $respuesta;

			}

		}


	}

	//---------------------------
	//Seleccion Regitros
	//---------------------------

	static public function ctrConsultaTabla($columna, $valor){

		$tabla = "usuarios";  //objeto table de la base de datos

		$respuesta = ModeloFormularios::mdlConsultaTabla($tabla, $columna, $valor);//Para reutilizar la Clase ConsultaTabla redefino con 3 parametros y en el caso anterior los paso como nulos
				
		return $respuesta;

	}

	//---------------------------
	//Limpiar Navegador
	//---------------------------

	public function ctrLimpiarMemNav(){

		echo '<script>  

				if ( window.history.replaceState ){

					window.history.replaceState ( null, null, window.location.href );

				}
			 </script>';
 	}


	//---------------------------
	//Ingreso
	//---------------------------

	public function ctrIngresoSistema(){

		if(isset($_POST["emailIngreso"])){		

				$tabla = "usuarios";  //objeto tabla de la base de datos

				$columna = "email";

				$emaillogin = $_POST["emailIngreso"];

				$ingreso = ModeloFormularios::mdlConsultaTabla($tabla, $columna, $emaillogin);

				if ($ingreso["email"] == $_POST["emailIngreso"] && $ingreso["password"] == crypt($_POST["contrasenaIngreso"], '$2a$07$Milanesa.Napolitana.con.Papas.Fritas$')){

						ModeloFormularios::mdlActualizarIntFalla($tabla, "0", $ingreso["token"]);

						$_SESSION["validarIngreso"] = "ok";  //Varables de tipo sesion sirven para manejo de sesiones e ingreso al sistema

						$limpiar = new ControladorFormularios();
						$limpiar -> ctrLimpiarMemNav();

						echo '<script>window.location =  "index.php?action=usuario"</script>';

				}else{

					if($ingreso["intentos_fallidos"]<2){

						$intFallidos = $ingreso["intentos_fallidos"]+1;

						ModeloFormularios::mdlActualizarIntFalla($tabla, $intFallidos, $ingreso["token"]);

					}else{

						echo '<br> <div class="alert alert-warning">No soy un Robot: ReCaptcha</div>';//Google Recaptcha se integra una vex que esta subido a un servidor

					}

					$limpiar = new ControladorFormularios();
					$limpiar -> ctrLimpiarMemNav();

					
					//ESTE CODIGO SE REPITE A LO LARGO DEL SISTEMA CREO UN METODO NO ESTATICO PARA REUTILIZARLO
					//echo '<script>  

					//			if ( window.history.replaceState ){

					//				window.history.replaceState ( null, null, window.location.href );

					//			}
					//		 </script>';

							//Creo con un HTML para confirmar e registro
					echo '<div class="alert alert-danger">Email o Contrasena incorrectos</div>';

				}
				//$ingreso = ModeloFormularios::mdlIngresoSistema($tabla, $columna, $emaillogin);		
		}

	}

	//---------------------------
	//Editar
	//---------------------------

	/*public function ctrEditar(){ 

		if(isset($_POST["usuarioEditar"])){   

			if($_POST["contrasenaEditar"] != ""){

				$password = $_POST["contrasenaEditar"];

			}else{

				$password = $_POST["contrasenaActual"];

			}


			$tabla = "usuarios"; //debo poner el nombre de la tabla que genere en la base de datos

			$datos = array("id" => $_POST["idEditar"],
						   "usuario" => $_POST["usuarioEditar"],
						   "password" => $password,
						   "email" => $_POST["emailEditar"]); //los datos los voy a pasar con un array con propiedades y valores, tiene que ser los mismos titulos que en la base de datos

			$respuesta = ModeloFormularios::mdlEditar($tabla, $datos);

			if($respuesta =="ok"){

				$limpiar = new ControladorFormularios();
				$limpiar -> ctrLimpiarMemNav();

				echo '<div class="alert alert-success">El usuario fue actualizado</div>

					  <script>

						setTimeout(function(){

							window.location = "index.php?action=usuario";

							},3000);

					  </script>';

			}


		}


	}*/
	 

	//---------------------------
	//Actualizar
	//---------------------------

	static public function ctrActualizar(){ 

		if(isset($_POST["usuarioEditar"])){   

			if(preg_match('/^[a-zA-ZñÑáéíóú ÁÉÍÓÚ]+$/', $_POST["usuarioEditar"]) /*&& 
			   preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $_POST["emailEditar"])*/){

				$consultaUsuario = ModeloFormularios::mdlConsultaTabla("usuarios", "token", $_POST["tokenEditar"]);

				$comparaToken = md5($consultaUsuario["email"]."+".$consultaUsuario["id"]."+".$consultaUsuario["fecha_registro"]);

				if($comparaToken == $_POST["tokenEditar"]){

					if($_POST["contrasenaEditar"] != ""){

						 if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["contrasenaEditar"])){

							$password = crypt($_POST["contrasenaEditar"], '$2a$07$Milanesa.Napolitana.con.Papas.Fritas$');

						}else{

							return "error";

						}

					}else{

						$password = $_POST["contrasenaActual"];

					}


					$tabla = "usuarios"; //debo poner el nombre de la tabla que genere en la base de datos

					$datos = array("token" => $_POST["tokenEditar"],
								   "usuario" => $_POST["usuarioEditar"],
								   "password" => $password/*,
								   "email" => $_POST["emailEditar"]*/); //los datos los voy a pasar con un array con propiedades y valores, tiene que ser los mismos titulos que en la base de datos

					$respuesta = ModeloFormularios::mdlEditar($tabla, $datos, NULL);

					return $respuesta;

				}else{

					return "error";

				}
		
			}else{

					return "error";

			}

		}

	}

	//---------------------------
	//Borrar
	//---------------------------

	public function ctrBorrarRegistro(){ 

		//echo '<pre>'; print_r($_POST["registroEliminar"]); echo '<pre>';//print_r($_POST["registroEliminar"]);

		if(isset($_POST["registroEliminar"])){

			$consultaUsuario = ModeloFormularios::mdlConsultaTabla("usuarios", "token", $_POST["registroEliminar"]); //Validaciones

			$comparaToken = md5($consultaUsuario["email"]."+".$consultaUsuario["id"]."+".$consultaUsuario["fecha_registro"]);

			if($comparaToken == $_POST["registroEliminar"]){

				$tabla = "usuarios"; //debo poner el nombre de la tabla que genere en la base de datos

				$tokenBorrar = $_POST["registroEliminar"];

				$respuesta = ModeloFormularios::mdlBorrarRegistro($tabla, $tokenBorrar);

				if($respuesta =="ok"){

					$limpiar = new ControladorFormularios();
					$limpiar -> ctrLimpiarMemNav();

					echo '<script>
									setTimeout(function(){

									window.location = "index.php?action=usuario";

									},1);

						   </script>';

				}

			}

		}

	}


}

