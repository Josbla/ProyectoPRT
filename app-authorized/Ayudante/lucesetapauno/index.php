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
    					<span><b>Concideración:</b> Se permiten vehículos que tengan un sistema de encendido de luces al momento de poner en marcha el motor y permanezcan encendidas durante el funcionamiento del mismo</span>
    					<hr style="width:100%;">
    					<div class="mt-3 d-flex flex-column">					
    						<span>¿Encienden las luces altas?</span>					
    						<div class="d-flex">
    							<input class="radio turq align-self-center" type="radio" name="rdoaltas" value="si" style="margin-top: 10px;"/>
    							<span class="align-self-center">Sí</span>
    						</div>					 
    						<div class="d-flex">
    							<input class="radio red align-self-center" type="radio" name="rdoaltas" value="no"style="margin-top: 10px;"/>
    							<span class="align-self-center">No</span>
    						</div>
    					</div>

    					<div class="mt-3 d-flex flex-column">					
    						<span>¿Encienden las luces bajas?</span>					
    						<div class="d-flex">
    							<input class="radio turq align-self-center" type="radio" name="rdobajas" value="si" style="margin-top: 10px;"/>
    							<span class="align-self-center">Sí</span>
    						</div>					 
    						<div class="d-flex">
    							<input class="radio red align-self-center" type="radio" name="rdobajas" value="no" style="margin-top: 10px;"/>
    							<span class="align-self-center">No</span>
    						</div>
    					</div>

    					<div class="mt-3 d-flex flex-column">					
    						<span>¿Encienden luces de estacionamiento?</span>					
    						<div class="d-flex">
    							<input class="radio turq align-self-center" type="radio" name="rdoestacionamiento" value="si"style="margin-top: 10px;"/>
    							<span class="align-self-center">Sí</span>
    						</div>					 
    						<div class="d-flex">
    							<input class="radio red align-self-center" type="radio" name="rdoestacionamiento" value="no"style="margin-top: 10px;"/>
    							<span class="align-self-center">No</span>
    						</div>
    					</div>
    				</div>
    				<!-- fin luces -->
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
    <?php include('./../../../master-page-lvl3/footer.php') ?>
    <?php include('./../../../master-page-lvl3/imports.php') ?>
</body>
</html>