<!DOCTYPE html>
<html>
<?php include('./../../../master-page-lvl3/header.php') ?>
<body>
	<?php include('./../../../master-page-lvl3/nav-bar.php') ?>
	<!-- CONTENIDO SITIO -->
	<div class="container">
		<header class="mt-3">
			<h2 class="text-center">Inspección visual</h2>
		</header>
		<section>
			<form action="" method="" class="mt-5">
				<hr style="width:100%;">

				<div class="container d-flex mt-5">
					<!-- inicio luces -->
					<div class="col-sm-6 d-flex justify-content-between flex-column">
						<span class="h4">Luces</span>
						<hr style="width:100%;">
						<span><b>Luces Izquierda: </b> </span>
						<span class="mt-4">Encender luces bajas</span>
						<div class="mt-3 d-flex flex-column">					
							<span>¿Las luces se encuentran alineadas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoalineadasizbaj" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoalineadasizbaj" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>Ingrese el valor de la intensidad de haz del luz</span>					
							
							<div class="d-flex col-sm-4">
								<input class="form-control align-self-center" type="text" name="txtresultadoizbaj" style="margin-top: 10px;"/>
							</div>	
						</div> 
						<hr class="mt-4" style="width:100%;">
						<span class="">Encender luces altas</span>

						<div class="mt-3 d-flex flex-column">					
							<span>¿Las luces se encuentran alineadas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoalineadasizalt" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoalineadasizalt" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>Ingrese el valor de la intensidad de haz del luz</span>					

							<div class="d-flex col-sm-4">
								<input class="form-control align-self-center" type="text" name="txtresultadoizalt" style="margin-top: 10px;"/>
							</div>	
						</div> 	
					</div>

					<div class="col-sm-6 d-flex justify-content-between flex-column">
						<span class="h4"></span>
						<hr class="mt-5" style="width:100%;">
						<span><b>Luces Derecha: </b> </span>
						<span class="mt-4">Encender luces bajas</span>
						<div class="mt-3 d-flex flex-column">					
							<span>¿Las luces se encuentran alineadas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoalineadasderbaj" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoalineadasderbaj" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>Ingrese el valor de la intensidad de haz del luz</span>					
							
							<div class="d-flex col-sm-4">
								<input class="form-control align-self-center" type="text" name="txtresultadoderbaj" style="margin-top: 10px;"/>
							</div>	
						</div> 
						<hr class="mt-4" style="width:100%;">
						<span class="">Encender luces altas</span>

						<div class="mt-3 d-flex flex-column">					
							<span>¿Las luces se encuentran alineadas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoalineadasderalt" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoalineadasderalt" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>Ingrese el valor de la intensidad de haz del luz</span>					

							<div class="d-flex col-sm-4">
								<input class="form-control align-self-center" type="text" name="txtresultadoderalta" style="margin-top: 10px;"/>
							</div>	
						</div> 	
					</div>
					<!-- fin luces -->
				</div>
				<div class="col-sm-12 d-flex mt-5">
					<div class="col-sm-4">
						<a href="./../" class="btn btn-primary btn-lg btn-block">Guardar</a>
					</div>
				</div>
			</form>
		</section>
	</div>
	<!-- FIN CONTENIDO -->
	<?php include('./../../../master-page-lvl3/footer.php') ?>
	<?php include('./../../../master-page-lvl3/imports.php') ?>
</body>
</html>