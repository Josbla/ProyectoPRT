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
					<!-- inicio lentes y micas -->
						<div class="col-sm-6 d-flex flex-column">
							<span class="h4">Lentes y Micas</span>
							<div class="mt-3 d-flex flex-column">					
								<span>¿Existen lentes?</span>					
								<div class="d-flex">
									<input class="radio turq align-self-center" type="radio" name="rdolentes" value="si"style="margin-top: 10px;"/>
									<span class="align-self-center">Sí</span>
								</div>					 
								 <div class="d-flex">
									<input class="radio red align-self-center" type="radio" name="rdolentes" value="no"style="margin-top: 10px;"/>
									<span class="align-self-center">No</span>
								</div>
							</div>

							<div class="mt-3 d-flex flex-column">					
								<span>¿Existen micas?</span>					
								<div class="d-flex">
									<input class="radio turq align-self-center" type="radio" name="rdomica" value="si"style="margin-top: 10px;"/>
									<span class="align-self-center">Sí</span>
								</div>					 
								 <div class="d-flex">
									<input class="radio red align-self-center" type="radio" name="rdomica" value="no"style="margin-top: 10px;"/>
									<span class="align-self-center">No</span>
								</div>
							</div>

							<div class="mt-3 d-flex flex-column">					
								<span>¿Existen quebraduras en lentes y micas de focos y faroles de señalización?</span>					
								<div class="d-flex">
									<input class="radio turq align-self-center" type="radio" name="rdoquebradura" value="si" style="margin-top: 10px;"/>
									<span class="align-self-center">Sí</span>
								</div>					 
								 <div class="d-flex">
									<input class="radio red align-self-center" type="radio" name="rdoquebradura" value="no" style="margin-top: 10px;"/>
									<span class="align-self-center">No</span>
								</div>
							</div>
							<div class="mt-3 d-flex flex-column">					
								<span>¿Existen objetos sobrepuestos (mayas u otros) en lentes y micas de focos y faroles de señalización?</span>					
								<div class="d-flex">
									<input class="radio turq align-self-center" type="radio" name="rdosobrepuesto" value="si" style="margin-top: 10px;"/>
									<span class="align-self-center">Sí</span>
								</div>					 
								 <div class="d-flex">
									<input class="radio red align-self-center" type="radio" name="rdosobrepuesto" value="no" style="margin-top: 10px;"/>
									<span class="align-self-center">No</span>
								</div>
							</div>
						</div>
					<!-- fin lentes y micas -->
				</div>
				<div class="col-sm-12 d-flex mt-5">
					<div class="col-sm-4">
						<button class="btn btn-primary btn-lg btn-block">GUARDAR</button>
					</div>
					<div class="col-sm-2"></div>
					<!--<div class="col-sm-4">
						<button class="btn btn-success btn-lg btn-block mb-5">SIGUIENTE</button>
					</div>-->
				</div>
   			</form>
   		</section>
   	</div>
    <!-- FIN CONTENIDO -->
    <?php include('./../../../master-page/footer.php') ?>
    <?php include('./../../../master-page/imports.php') ?>
</body>
</html>