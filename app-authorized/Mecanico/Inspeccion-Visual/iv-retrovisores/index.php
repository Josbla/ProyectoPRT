<!DOCTYPE html>
<html>
<?php include('./../../../../master-page-lvl4/header.php') ?>
<body>
	<?php include('./../../../../master-page-lvl4/nav-bar.php') ?>
	<!-- CONTENIDO SITIO -->
	<div class="container">
		<header class="mt-3">
			<h2 class="text-center">Inspección visual</h2>
		</header>
		<section>
			<form action="" method="" class="mt-5">
				<hr style="width:100%;">
				
				<div class="container d-flex mt-5">
					<!-- inicio retrovisores -->
					<div class="col-sm-6 d-flex justify-content-between flex-column">
						<span class="h4">Retrovisores</span>
						<div class="mt-3 d-flex flex-column">					
							<span>¿Existe retrovisor interno?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdointerno" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdointerno" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿La sujeción es corresta?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdosujecion" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdosujecion" value="no" style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿La visibilidad es amplia desde el interior (Excepto vehículos cuyas caracteristicas impidan una visual amplia desde el interior)?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoamplia" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoamplia" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿Existen retrovisores exteriores y estan situados uno a cada lado del conductor, para vehículos de año de fabricación 1995 o pasterior y vehículos que no cuenten con retrovisor interior? Para los demás casos verificar la existencia de a los menos el retrovisor izquierdo del conductor.</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoexterior" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoexterior" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿La visibilidad de los retrovisores exteriores es la correcta?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoexterior" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							<div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoexterior" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>
					</div>
					<!-- fin retrovisores -->
				</div>
				<div class="col-sm-12 d-flex mt-5">
					<div class="col-sm-4">
						<a href="./../" class="btn btn-primary btn-lg btn-block">GUARDAR</a>
					</div>
					<div class="col-sm-2"></div>
				</div>
			</form>
		</section>
	</div>
	<!-- FIN CONTENIDO -->
	<?php include('./../../../../master-page-lvl4/footer.php') ?>
	<?php include('./../../../../master-page-lvl4/imports.php') ?>
</body>
</html>