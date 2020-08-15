<?php

	if(isset($_GET["id"])){

		$columna = "id";

		$valor = $_GET["id"];

		$usuario = ControladorFormularios::ctrConsultaTabla($columna, $valor);

	}

?>



<div class="container">

	<h1>Editar Usuario</h1>

</div>

<div class="container-fluid p-4 my-0 text-center text-black">
		
	<div class="container">

		<div class="d-flex justify-content-center">

			<form class="form-group" novalidate method="post">
				<div class="form-group text-left">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
						<input type="text" class="form-control" id="usuario" value= "<?php echo $usuario["usuario"]; ?>" placeholder="Actualizar nombre" name="usuarioEditar">
					</div>
				</div>				
				<div class="form-group text-left">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						<input type="email" class="form-control" id="email" value= "<?php echo $usuario["email"]; ?>"placeholder="Actualizar email" name="emailEditar">
					</div>
					
				</div>
				<div class="form-group text-left">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						<input type="password" class="form-control" id="pwd" placeholder="Actualizar Contraseña" name="contrasenaEditar">
						<input type="hidden" name="contrasenaActual" value= "<?php echo $usuario["password"]; ?>"> <!--LA CONTRASENA LA PASAMOS POR OTRO INPUT DE TIPO HIDDEN LUEGO HAY QUE ENCRIPTARLA-->
					</div>
					<div class="input-group-prepend"> <!-- Debo enviar el ID para poder hacer la busqueda en la DB-->
						<input type="hidden" name="idEditar" value= "<?php echo $usuario["id"]; ?>">
					</div>
				</div>
				
				<!--<?php/*

					//Tambien puedo hacerlo con un metodo estatico
					$editar = new ControladorFormularios();
					$editar -> ctrEditar();*/

				?>-->

				<?php

					$actualizar = ControladorFormularios::ctrActualizar();

					if($actualizar =="ok"){

					echo '<script>  

									if ( window.history.replaceState ){

										window.history.replaceState ( null, null, window.location.href );

									}
								 </script>';//Limpia la memoria del navegador					


					//$limpiar = new ControladorFormularios();
					//$limpiar -> ctrLimpiarMemNav();

					echo '<div class="alert alert-success">El usuario fue actualizado</div>

						  <script>

							setTimeout(function(){

								window.location = "index.php?action=usuario";

								},2500);

						  </script>';

					}

				?>
			

				<button type="submit" class="btn btn-primary">Actualizar</button>
			</form>

		</div>


		<!--<form method="post", action="">

			<input type="text" placeholder="Usuario" name="usuario" required>

			<input type="password" placeholder="Contraseña" name="password" required>

			<input type="email" placeholder="Email" name="email" required>

			<input type="submit" value="Enviar">

		</form>-->

	</div>

</div>