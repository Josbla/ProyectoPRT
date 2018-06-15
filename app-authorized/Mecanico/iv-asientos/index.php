<!DOCTYPE html>
<html>
<?php include('./../../../master-page/header.php') ?>
<body>
	<?php include('./../../../master-page/nav-bar.php') ?>
	<!-- CONTENIDO SITIO -->
	<div class="container">
		<header class="mt-3">
			<h2 class="text-center">Inspección visual</h2>
		</header>
		<section>
			<form action="" method="" class="mt-5">
				<hr style="width:100%;">
				
				<div class="container d-flex mt-5">
					<!-- inicio asientos -->
					<div class="col-sm-6 d-flex justify-content-between flex-column">
						<span class="h4">Asientos</span>
						<div class="mt-3 d-flex flex-column">					
							<span>¿Es correcta la fijación del asiento del conductor?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoconductor" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoconductor" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿Es correcta la fijación del asiento de los pasajeros?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdopasajero" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdopasajero" value="no" style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>En vehículos livianos de año de fabricación 1995 y posteriores ¿Existe un apoyacabezas, en todos los asientos delanteros y/o en los espacios destinados a asientos en los vehículos que tienen butaca delantera continua? Asimismo, en los vehículos livianos años 2002 o superior ¿Existe apoyacabezas en todos los asientos en que debe llevarse cinturón de seguridad de tres puntas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoapoyacabezas" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoapoyacabezas" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>
					</div>
					<!-- fin retrovisores -->
				</div>
				<div class="col-sm-12 d-flex mt-5">
					<div class="col-sm-4">
						<button class="btn btn-primary btn-lg btn-block">GUARDAR</button>
					</div>
				</div>
			</form>
		</section>
	</div>
	<!-- FIN CONTENIDO -->
	<?php include('./../../../master-page/footer.php') ?>
	<?php include('./../../../master-page/imports.php') ?>
</body>
</html>