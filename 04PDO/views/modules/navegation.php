<div class="container-fluid p-4 my-0 text-center text-black">
		
	<div class="container">

		<ul class="nav nav-tabs">

			<?php if (isset($_GET ["action"])): ?>
			
				<?php if ($_GET ["action"] == "registro"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php">Registro</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php">Registro</a>	
					</li>

				<?php endif ?>

				<?php if ($_GET ["action"] =="ingresar"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?action=ingresar">Ingreso</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?action=ingresar">Ingreso</a>	
					</li>

				<?php endif ?>
				
				<?php if ($_GET ["action"] =="usuario"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?action=usuario">Usuarios</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?action=usuario">Usuarios</a>	
					</li>

				<?php endif ?>

				<?php if ($_GET ["action"] =="salir"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?action=salir">Salir</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?action=salir">Salir</a>	
					</li>

				<?php endif ?>

				<?php else: ?>

					<li class="nav-item">
					    <a class="nav-link active" href="index.php">Registro</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="index.php?action=ingresar">Ingreso</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="index.php?action=usuario">Usuarios</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="index.php?action=salir">Salir</a>
					</li>
			</ul>		

		<?php endif ?>

	</div>
</div>


<!--<nav>
	<ul>
		<li><a href="index.php">Registro</a></li>
		<li><a href="index.php?action=ingresar">Ingreso</a></li>
		<li><a href="index.php?action=editar">Editar</a></li>
		<li><a href="index.php?action=usuario">Usuarios</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>
	</ul>	
</nav>-->
