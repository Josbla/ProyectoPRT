<!DOCTYPE html>
<html>
<?php include('./../../../master-page-lvl3/header.php') ?>
<body>
	<?php include('./../../../master-page-lvl3/nav-bar.php') ?>
	<!-- CONTENIDO SITIO -->
	<header class="mt-3">
		<h2 class="text-center">Sistema de suspensión</h2>
	</header>
	<section>
		<form action="" method="" class="mt-5">
			<hr style="width:100%;">

			<div class="container d-flex mt-5">
				<!-- inicio ruedas delanteras -->
				<div class="col-sm-6 d-flex justify-content-between flex-column">
					<span class="h4">Ruedas delanteras</span>

					<div class="mt-5 d-flex flex-column">					
						<span>Ingrese el valor obtenido en el ciclo de pruebas</span>					

						<div class="d-flex col-sm-4">
							<input class="form-control align-self-center" type="text" name="txtresultadoruedadel" style="margin-top: 10px;"/>
						</div>	
					</div> 	

					<div class="mt-3 d-flex flex-column">					
						<span>¿La alineación es correcta?</span>					
						<div class="d-flex">
							<input class="radio turq align-self-center" type="radio" name="rdoruedasdel" value="si" style="margin-top: 10px;"/>
							<span class="align-self-center">Sí</span>
						</div>					 
						<div class="d-flex">
							<input class="radio red align-self-center" type="radio" name="rdoruedasdel" value="no"style="margin-top: 10px;"/>
							<span class="align-self-center">No</span>
						</div>
					</div>    				
				</div>

				<div class="col-sm-6 d-flex justify-content-between flex-column">
					<span class="h4">Ruedas traseras</span>

					<div class="mt-5 d-flex flex-column">					
						<span>Ingrese el valor obtenido en el ciclo de pruebas</span>					

						<div class="d-flex col-sm-4">
							<input class="form-control align-self-center" type="text" name="txtresultadoruedatra" style="margin-top: 10px;"/>
						</div>	
					</div> 	

					<div class="mt-3 d-flex flex-column">					
						<span>¿La alineación es correcta?</span>					
						<div class="d-flex">
							<input class="radio turq align-self-center" type="radio" name="rdoruedastra" value="si" style="margin-top: 10px;"/>
							<span class="align-self-center">Sí</span>
						</div>					 
						<div class="d-flex">
							<input class="radio red align-self-center" type="radio" name="rdoruedastra" value="no"style="margin-top: 10px;"/>
							<span class="align-self-center">No</span>
						</div>
					</div>    				
				</div>
			</div>
			<div class="col-sm-12 d-flex mt-5 ml-5">
					<div class="col-sm-3 mt-5 ml-4">
						<a href="./../" class="btn btn-primary btn-lg btn-block mb-3">GUARDAR</a>
					</div>
			</div>
		</form>
	</section>    
	<!-- FIN CONTENIDO -->
	<?php include('./../../../master-page-lvl3/footer.php') ?>
	<?php include('./../../../master-page-lvl3/imports.php') ?>
</body>
</html>