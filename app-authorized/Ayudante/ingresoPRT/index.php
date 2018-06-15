<!DOCTYPE html>
<html>
    <?php include('./../../../master-page-lvl3/header.php') ?>
<body>
    <?php include('./../../../master-page-lvl3/nav-bar.php') ?>
    <!-- CONTENIDO SITIO -->
    <div class="container">
    	<header class="mt-3">
    		<h2 class="text-center">Identificación del vehículo y documentación</h2>
    	</header>
    	<section>
    		<form action="" method="" class="mt-5">
    			<!-- Inicio datos vehículo -->
    			<hr style="width:100%;">
    			<span class="h4">Identificación del vehículo</span>
				<div class="d-flex mt-3 ">
					<div class="d-flex flex-column col-sm-5">
						<div class="form-group row mt-3">
							<label for="input-patente" class="col-sm-2 col-form-label">Patente</label>
							<div class="col-sm-10 d-flex justify-content-around">
							  <input type="text" class="form-control text-center col-sm-2 px-1" id="input-patente" placeholder="AB" name="patentebloque1">
							  <input type="text" class="form-control text-center col-sm-2 px-1" id="input-patente" placeholder="CD" name="patentebloque2">
							  <input type="text" class="form-control text-center col-sm-2 px-1" id="input-patente" placeholder="12" name="patentebloque3">
							</div>
						</div>

						<div class="form-group row mt-2">
							<label for="input-marca" class="col-sm-2 col-form-label">Marca</label>
							<div class="col-sm-10">
								<input type="text" class="form-control px-1" id="input-marca" placeholder="Marca" name="marca">
							</div>
						</div>

						<div class="form-group row mt-2">
							<label for="input-year" class="col-sm-2 col-form-label">Año</label>
							<div class="col-sm-10">
								<input type="text" class="form-control px-1" id="input-year" placeholder="1987" name="year">
							</div>
						</div>

						<div class="form-group row mt-2">
							<label for="input-color" class="col-sm-2 col-form-label">Color</label>
							<div class="col-sm-10">
								<input type="text" class="form-control px-1" id="input-color" placeholder="Ej: Azul" name="color">	
							</div>
						</div>

						<div class="form-group row mt-2 de-flex">
							<label for="input-asientos" class="col-sm-8 col-form-label">N° Corridas de Asientos incluida la del conductor</label>
							<div class="col-sm-4 d-flex align-item-center">
								<input type="text" class="form-control text-center px-1" id="input-asientos" placeholder="N° Asientos" name="asientos">	
							</div>
						</div>

						<div class="form-group row mt-2">
							<label for="input-combustible" class="col-sm-6 col-form-label">Tipo de combustible</label>
							<div class="col-sm-6">
								<input type="text" class="form-control text-center px-1" id="input-combustible" placeholder="Tipo de combustible" name="combustible">	
							</div>
						</div>
						
						<div class="form-group row mt-2">
							<label for="input-ejes" class="col-sm-6 col-form-label">N°/Disposición de Ejes(*)</label>
							<div class="col-sm-6 d-flex align-item-center">
								<input type="text" class="form-control text-center px-1" id="input-ejes" placeholder="N°/Disposición de Ejes" name="ejes">	
							</div>
						</div>
					</div>

					<div class="d-flex flex-column col-sm-7">
						<div class="form-group row mt-2">
							<label for="input-vehiculo" class="col-sm-3 col-form-label">Tipo de vehículo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control px-1" id="input-vehiculo" placeholder="Tipo de vehículo" name="vehiculo">	
							</div>
						</div>

						<div class="form-group row mt-2">
							<label for="input-modelo" class="col-sm-3 col-form-label">Modelo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control px-1" id="input-modelo" placeholder="Modelo" name="modelo">	
							</div>
						</div>

						<div class="form-group row mt-2">
							<label for="input-modelo" class="col-sm-3 col-form-label">N° chasis</label>
							<div class="col-sm-9">
								<input type="text" class="form-control px-1 " id="input-modelo" placeholder="1ABCD2345E004352" name="modelo" style="letter-spacing: 0.3em;">
							</div>
						</div>

						<div class="d-flex pl-0">
							<div class="d-flex flex-column col-sm-6 pl-0 justify-content-around">
								<div class="form-group row mt-3">
									<label for="input-cilindrada" class="col-sm-6 col-form-label">Cilindrada</label>
									<div class="col-sm-6">
										<input type="text" class="form-control px-1" id="input-cilindrada" placeholder="000 cm&sup3" name="cilindrada">	
									</div>
								</div>

								<div class="form-group row mt-3">
									<label for="input-puertas" class="col-sm-6 col-form-label">N° Puertas</label>
									<div class="col-sm-6">
										<input type="text" class="form-control px-1" id="input-puertas" placeholder="4" name="puertas">	
									</div>
								</div>

								<div class="form-group row mt-3">
									<label for="input-traccion" class="col-sm-6 col-form-label">Tipo Tracción</label>
									<div class="col-sm-6">
										<input type="text" class="form-control px-1" id="input-traccion" placeholder="FWD" name="traccion">	
									</div>
								</div>

								<div class="form-group row mt-3">
									<label for="input-carroceria" class="col-sm-6 col-form-label">Tipo carroceria(*)</label>
									<div class="col-sm-6 d-flex align-item-center">
										<input type="text" class="form-control px-1" id="input-carroceria" placeholder="Liftback" name="carroceria">	
									</div>
								</div>
							</div>
							<div class="d-flex flex-column col-sm-6 pr-0">
								<div class="form-group row mt-3">
									<label for="input-cantasientos" class="col-sm-7 col-form-label">N° Asientos</label>
									<div class="col-sm-5">
										<input type="text" class="form-control px-1" id="input-cantasientos" placeholder="5" name="cantasientos">	
									</div>
								</div>

								<div class="form-group row mt-3">
									<label for="input-pasillo" class="col-sm-7 col-form-label">Ancho Pasillo (cm)</label>
									<div class="col-sm-5 d-flex align-item-center">
										<input type="text" class="form-control px-1" id="input-pasillo" placeholder="180 cm" name="pasillo">	
									</div>
								</div>

								<div class="form-group row mt-3">
									<label for="input-peso" class="col-sm-7 col-form-label">Peso bruto vehícular (kg*)</label>
									<div class="col-sm-5 d-flex align-item-center">
										<input type="text" class="form-control px-1" id="input-peso" placeholder="180 cm" name="peso">	
									</div>
								</div>

								<div class="form-group row mt-3">
									<label for="input-cabina" class="col-sm-7 col-form-label">Tipo Cabina(*)</label>
									<div class="col-sm-5 d-flex align-item-center">
										<input type="text" class="form-control px-1" id="input-cabina" placeholder="180 cm" name="cabina">	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Final datos vehículo -->
				<!-- Inicio datos peticionario -->
				<hr style="width:100%;">
				<span class="h4">Identificación del Peticionario</span>
				<div class="d-flex flex-column mt-3">
					<div class="d-flex mt-3 col-sm-12	">
						<div class="col-sm-7">
							<div class="form-group row mt-3">
								<label for="input-nombre" class="col-sm-2 col-form-label pl-0">Nombre</label>
								<div class="col-sm-10 d-flex pr-0">
								  <input type="text" class="form-control px-1" id="input-nombre" placeholder="Nombre Completo" name="nombre">
								</div>
							</div>
						</div>
					</div>
					
					<div class="d-flex mt-3 col-sm-12 pr-0">
						<div class="col-sm-7">
							<div class="form-group row mt-2">
								<label for="input-domicilio" class="col-sm-2 col-form-label pl-0">Domicilio</label>
								<div class="col-sm-10">
									<input type="text" class="form-control px-1" id="input-domicilio" placeholder="Av. Libertador Bernardo O'higgins 1234" name="domicilio">
								</div>
							</div>
						</div>
						<div class="col-sm-5 pr-0">
							<div class="form-group row mt-2">
								<label for="input-telefono" class="col-sm-2 col-form-label">Teléfono</label>
								<div class="col-sm-10">
									<input type="text" class="form-control px-1 pr-0" id="input-telefono" placeholder="56912345678" name="telefono">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mt-3">
					    <textarea class="form-control" id="observaciones" name="observaciones" rows="3" cols="5" placeholder="Observaciones" style="resize: none"></textarea>
					 </div>
				</div>
				<!-- Final datos peticionario -->
				<div class="col-sm-12 d-flex mt-5">
					<div class="col-sm-4">
						<button class="btn btn-primary btn-lg btn-block">GUARDAR</button>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<a class="btn btn-secondary btn-lg btn-block mb-5 text-light" href="../">CANCELAR</a>
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