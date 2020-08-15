<?php

	if(!isset($_SESSION["validarIngreso"])){

		echo '<script>window.location =  "index.php?action=ingresar"</script>';

		return;

	}else{

		if($_SESSION["validarIngreso"] != "ok"){

			echo '<script>window.location =  "index.php?action=ingresar"</script>';

			return;

		}

	}

	$mostrar = ControladorFormularios::ctrConsultaTabla(NULL, NULL); 
	//echo '<pre>'; print_r($mostrar); echo '<pre>';
?>


<div class="container">

	<h1>Usuarios</h1>

</div>

<div class="container-fluid py-5 my-0 text-center text-black">
		
	<div class="container">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<!--<th>token</th>-->
					<th>Email</th>
					<th>Fecha Creacion</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($mostrar as $key => $value): ?> <!-- Con el foreach hago un recorrido por el objeto mostrar-->
					<tr>
						<td><?php echo ($key+1)?></td>
						<td><?php echo $value["usuario"]?></td>
						<!--<td><?php #echo $value["token"]?></td>-->
						<td><?php echo $value["email"]?></td>
						<td><?php echo $value["fecha_registro"]?></td>
						<td>
							
							<div class="btn-group">
								<!--<button type="button" class="btn btn-warning">Editar <i class="far fa-edit"></i></button> Este boton lo cambio por un anchor y le agrego un href parad ireccionarlo a una pgagina nueva de edicion por otra parte debo pasarle la variable GET de ID a fin de poder reconocer la fila a editar -->
								<!--<button type="button" class="btnn btn-warning">Editar <i class="far fa-edit"></i></butto>Cambio por una etiqueta anchor, no hay problema mientras el la clase sea btn, tbn le agrego un href para que me pase la variable GET direccion a la pagina de edicion. para poder hacer la edicion necesito que me pase otra variable GET con el ID del usuario, las otras variables GET se pasan agregand "&" en este caso el id lo paso con un etiqueta php-->
								<div class="px-1" >
									<a href="index.php?action=editar&token=<?php echo $value["token"];?>" class="btn btn-warning">Editar <i class="far fa-edit"></i></a><!-- En este caso estoy enviando el ID como una variable GET es decir atraves de la URL, una forma mas segura es hacerlo con un formulario POST-->
								</div>
									<form method = "post"> <!--En este caso envio la info con un formulario POST-->
										
										<input type="hidden" value = "<?php echo $value["token"];?>" name="registroEliminar">
										
										<button onclick="return confirm('Esta seguro que desea borrar este registro?');" type="submit" class="btn btn-danger">Borrar <i class="far fa-trash-alt"></i></button>
										
										<?php

											$eliminar = new ControladorFormularios();
											$eliminar -> ctrBorrarRegistro();	

										?>


									</form>

							</div>

						</td>
					</tr>

				<?php endforeach ?>

			</tbody>
		</table>

	</div>

</div>
	<!--<table border="1">
		
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>>Juan</td>
				<td>1234</td>
				<td>juan@hotmail.com</td>
				<td><button>Editar</button></td>
				<td><button>Borrar</button></td>
			</tr>
		</tbody>

	</table>-->
