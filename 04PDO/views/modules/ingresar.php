<div class="container">

	<h1>Ingreso</h1>

</div>

<div class="container-fluid p-4 my-0 text-center text-black">
		
	<div class="container">		

		<div class="d-flex justify-content-center" >

			<form action="" class="needs-validation" novalidate method="post">
				<div class="form-group text-left">
					<label for="email">Correo Electronico</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						<input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="emailIngreso" required><!-- DEBO usar el atributo name para definir la variable POST-->
					</div>
					<div class="valid-feedback">Valido</div>
					<div class="invalid-feedback">Por favor llene este campo.</div>
				</div>
				<div class="form-group text-left">
					<label for="pwd">Contraseña</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						<input type="password" class="form-control" id="pwd" placeholder="Ingrese su Contraseña" name="contrasenaIngreso"required>
					</div>
					<div class="valid-feedback">Valido</div>
					<div class="invalid-feedback">Por favor .</div>
				</div>
				<button type="submit" class="btn btn-primary">Ingresar</button>
			</form>

		</div>

		<?php

			
			$ingreso = new ControladorFormularios();
			$ingreso -> ctrIngresoSistema();

	 	?>



		<script> //JS se ejecuta en el navegador no puede hacerse un metodo con este codigo, PHP se ejecuta en el servidor
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











<!--	<form method="post", action="">

		<input type="text" placeholder="Usuario" name="usuario" required>

		<input type="password" placeholder="Contraseña" name="password" required>

		<input type="submit" value="Enviar">

	</form>-->