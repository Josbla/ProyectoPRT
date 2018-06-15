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
					<!-- Vidrios y parabrisas -->
					<div class="col-sm-6 d-flex justify-content-between flex-column">
						<span class="h4">Vidrios y Parabrisas</span>
						<div class="mt-3 d-flex flex-column">					
							<span>¿Existen vidrios?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdovidrio" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							 <div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdovidrio" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿Existen parabrisas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdoparabrisa" value="si" style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							 <div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdoparabrisa" value="no" style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿La visibilidad del conductor es perfecta a través de vidrios?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdovision" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							 <div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdovision" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>

						<div class="mt-3 d-flex flex-column">					
							<span>¿La visibilidad del conductor es perfecta a través de parabrisas?</span>					
							<div class="d-flex">
								<input class="radio turq align-self-center" type="radio" name="rdovision2" value="si"style="margin-top: 10px;"/>
								<span class="align-self-center">Sí</span>
							</div>					 
							 <div class="d-flex">
								<input class="radio red align-self-center" type="radio" name="rdovision2" value="no"style="margin-top: 10px;"/>
								<span class="align-self-center">No</span>
							</div>
						</div>
					</div>
					<!-- fin vidrios y parabrisas -->
				</div>
				<div class="col-sm-12 d-flex mt-5">
					<div class="col-sm-4">
						<button class="btn btn-primary btn-lg btn-block">GUARDAR</button>
					</div>
					<div class="col-sm-2"></div>
					<!--<div class="col-sm-4">
						<button class="btn btn-success btn-lg btn-block mb-5">SIGUIENTE</button>
					</div-->
				</div>
   			</form>
   		</section>
   	</div>
    <!-- FIN CONTENIDO -->
    <?php include('./../../../master-page/footer.php') ?>
    <?php include('./../../../master-page/imports.php') ?>
</body>
</html>