<div class="container"><!--DEBE IR EN EL TEMPLATE--><!--DEBE IR EN EL TEMPLATE-->

	<h1>Registro de Usuarios</h1>

</div> <!--DEBE IR EN EL TEMPLATE-->

<div class="container-fluid p-4 my-0 text-center text-black"> <!--DEBE IR EN EL TEMPLATE-->
		
	<div class="container">	<!--DEBE IR EN EL TEMPLATE-->	

		<div class="d-flex justify-content-center" >

			<form action="" class="needs-validation" novalidate method="post"><!--Debo definir el atributo method "post" para poder tomar los datos-->
				

				<div class="form-group text-left">
					<label for="nombre">Nombre</label>
					<div class="input-group-prepend">
						<!--Agrego un icono de FONT AWESOME VIA BOOTSRTAP BS4 input groups-->
						<span class="input-group-text"><i class="fas fa-user"></i></span>
						<input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombreRegistro" required>
					</div>
					<div class="valid-feedback">Valido</div>
					<div class="invalid-feedback">Por favor llene este campo.</div>
				</div>
				<div class="form-group text-left">
					<label for="email">Correo Electronico</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						<input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="emailRegistro" required><!-- DEBO usar el atributo name para definir la variable POST-->
					</div>
					<div class="valid-feedback">Valido</div>
					<div class="invalid-feedback">Por favor llene este campo.</div>
				</div>
				<div class="form-group text-left">
					<label for="pwd">Contraseña</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						<input type="password" class="form-control" id="pwd" placeholder="Ingrese su Contraseña" name="contrasenaRegistro"required>
					</div>
					<div class="valid-feedback">Valido</div>
					<div class="invalid-feedback">Por favor llene este campo.</div>
				</div>
				<div class="form-group form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="checkbox" required id="cb1"> Estoy de acuerdo con los terminos y condiciones.
						<div class="valid-feedback">Valido</div>
						<div class="invalid-feedback">Tilde este checkbox para continuar.</div>
					</label>
				</div>

				<?php


					//Forma de instanciar un metodo no estatico
					//$registro = new ControladorFormularios();
					//$registro -> ctrRegistro();

					$registro = ControladorFormularios::ctrRegistro();

					if ($registro == "ok"){
							//Creo con JavaScript la limpieza de la memoria sino lo agrego cada vez actualizao la pagina estaria guardando el regsitro nuevamente
							
							echo '<script>  

									if ( window.history.replaceState ){

										window.history.replaceState ( null, null, window.location.href );

									}
								 </script>';

							//$ingreso = new ControladorFormularios(); No funciona este forma de limpiar el navegador por que se corre en el servidor y no en el navegador
							//$ingreso -> ctrIngresoSistema();

							//Creo con un HTML para confirmar e registro
							echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
					}

					if ($registro == "error"){

						$ingreso = new ControladorFormularios();
						$ingreso -> ctrIngresoSistema();

						echo '<div class="alert alert-danger">Error no se premiten caracteres especiales</div>';

					};

				?>


				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>

		</div>

		<script>
		// Disable form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
		// Get the forms we want to add validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
		}, false);
		})();
		</script>

	</div>

</div>

	<!--<form method="post", action="">

		<input type="text" placeholder="Usuario" name="usuario" required>

		<input type="password" placeholder="Contraseña" name="password" required>

		<input type="email" placeholder="Email" name="email" required>

		<input type="submit" value="Enviar">

	</form>-->