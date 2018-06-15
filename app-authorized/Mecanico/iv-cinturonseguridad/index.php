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
						<span class="h4">Cinturones de seguridad</span>
						<span><strong>Delanteros</strong></span>
						<div class="mt-3 d-flex flex-column">					
							<span>¿Existen cinturones de seguridad en asientos delanteros?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdocinturondel" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdocinturondel" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>En el caso de los asientos adyacentes a las puertas ¿El cinturon de seguridad es de tres puntas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoadyacentedel" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoadyacentedel" value="no" style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>De existir asientos no adyacentes a las puertas ¿Existe cinturon de seguridad de algún tipo? (No obligatoria)</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdonoadyacentedel" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdonoadyacentedel" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>
						
						<hr class="mt-5" style="width:100%;"
						<span><b>Concideración: </b> Completar este apartado solo en vehículos livianos y con año de fabricación 2002 o posterior</span>
						<hr class="mb-5" style="width:100%;"
						<span><strong>Traseros</strong></span>
						<div class="mt-3 d-flex flex-column">					
							<span>En el caso de los asientos adyacentes a las puertas ¿El cinturon de seguridad es de tres puntas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoadyacentetra" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoadyacentetra" value="no" style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>En el caso de los asientos no adyacentes a las puertas ¿Existe cinturon de seguridad de algún tipo? </span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdonoadyacentetra" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdonoadyacentetra" value="no"style="margin-top: 10px;"/>
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