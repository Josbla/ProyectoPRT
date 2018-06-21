<?php 
    include('../../../DataManager/Data/consultas.php');
    session_start();
    $consulta = new Consultas;
    $result = $consulta->listarPlantas();
    $comunas = $consulta->getComunas();
    $provincias = $consulta->getProvincias();
    $regiones = $consulta->getRegiones();
    $countRegiones = count($regiones);
    $countProvincias = count ($provincias);
    $countComunas = count($comunas);
    $resultXPag = 10;
    $totalResults=count($result);
    $paginas = ceil($totalResults/$resultXPag);
    if(!$_GET){
        header('Location: ./?pagina=1');
    }
    $iniciar = ($_GET['pagina']-1)*$resultXPag;
    $finalizar = ($iniciar+$resultXPag);
    
    if($_GET['pagina'] > $paginas || $_GET['pagina'] < 1){
        header('Location: ./?pagina=1');
    }
    if(!empty($_SESSION['failInsert'])){
        if($_SESSION['failInsert']){
            echo('<script>
                alert("se presento un error desconocido");
            </script>');
        }
    }

?>
<!DOCTYPE html>
<html>
    <?php include('../../../master-page-lvl3/header-admin.php') ?>
    <body>
        <?php include('../../../master-page-lvl3/nav-admin.php') ?>
        <script>
            angular.module('dinamic', [])
            .controller('dinamicController',['$scope','$http', function($scope, $http){
                var arrayRegiones = [];
                var arrayProvincias = [];
                var arrayComunas = [];
                var provinciaRegion =[];
                var comunaFiltrada=[];
                <?php for($x=0; $x< $countRegiones; $x++): ?>
                        arrayRegiones.push({id : '<?php echo($regiones[$x]->IDRegion) ?>', nombre: '<?php echo(utf8_encode($regiones[$x]->DescRegion)) ?>'});
                <?php endfor ?>
                <?php for($x=0; $x< $countProvincias; $x++): ?>
                        arrayProvincias.push({id : '<?php echo($provincias[$x]->IDProvincia) ?>', nombre: '<?php echo(utf8_encode($provincias[$x]->DescProvincia)) ?>', rProvincia:'<?php echo($provincias[$x]->RegionProvincia) ?>'});
                <?php endfor ?>
                <?php for($x=0; $x< $countComunas; $x++): ?>
                        arrayComunas.push({id : '<?php echo($comunas[$x]->IDComuna) ?>', nombre: '<?php echo(utf8_encode($comunas[$x]->DescComuna)) ?>', pComuna:'<?php echo( $comunas[$x]->ProvinciaComuna) ?>' });
                <?php endfor ?>
                $scope.index = 0;
                $scope.regiones = arrayRegiones;
                $scope.regionSelec = arrayRegiones[0].id;
                $scope.comunaSelec;
                $scope.CurrentDate = new Date();
                $scope.Hora = $scope.CurrentDate.getHours();
                $scope.Minutos = $scope.CurrentDate.getMinutes();
                
                $scope.updateComunas= function(pRegion){
                    provinciaRegion=[];
                    comunaFiltrada=[];

                    for(var i = 0; i< arrayProvincias.length; i++){
                        if(pRegion == arrayProvincias[i].rProvincia)
                            provinciaRegion.push(arrayProvincias[i]);
                    }

                    for(var i=0; i< provinciaRegion.length; i++){
                        for(var x=0; x < arrayComunas.length; x++ ){
                            if(arrayComunas[x].pComuna == provinciaRegion[i].id)
                                comunaFiltrada.push(arrayComunas[x]);
                        }
                    }
                    $scope.comunas = comunaFiltrada;
                }  
                
                $scope.updateIndex = function(region, comuna){
                    var comunaReal = arrayComunas.find(function(element){
                        return element.id == comuna;
                    });
                    $scope.regionSelec2 = arrayRegiones[region].id;
                    $scope.comunaSelec2 = comunaReal.id;
                }
                
                
            }]);
        </script>
        <main class="container" ng-app="dinamic" ng-controller="dinamicController">
            <!--Paginacion-->
            <div class="row mt-5">
                <div class="col">
                    <a class="nav-link text-success font-weight-bold" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Subscribir planta</a>
                </div>
                <div class="col">
                    <span class="font-weight-bold">Plantas de revisión tecnica</span>
                </div>
                <div class="col">
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <li class="page-item <?php echo($_GET['pagina'] <= 1 ? 'disabled' : ''); ?>">
                                <a class="page-link" href="?pagina=<?php echo($_GET['pagina']-1); ?>">
                                    Anterior
                                </a>
                            </li>
                            <?php for($i=0; $i<$paginas; $i++): ?>
                                    <li class="page-item <?php echo($_GET['pagina'] == $i+1 ? 'active' : ''); ?>" >
                                        <a class="page-link" href="?pagina=<?php echo($i+1); ?>"> 
                                            <?php echo($i+1); ?> <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                            <?php endfor ?>   
                            
                            <li class="page-item <?php echo($_GET['pagina'] >= $paginas ? 'disabled' : ''); ?>">
                                <a class="page-link" href="?pagina=<?php echo $_GET['pagina']+1; ?>">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <table class="table mt-1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Acción</th>
                            <th scope="col">Nombre planta</th>
                            <th scope="col">Región</th>
                            <th scope="col">provincia</th>
                            <th scope="col">comuna</th>
                            <th scope="col">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($finalizar > $totalResults){
                                $finalizar = $totalResults;
                            }
                            for($i=$iniciar; $i<$finalizar; $i++): ?>
                        <tr>
                            <th scope="row"><?php echo($i+1) ?></th>
                            <td>
                                <span data-toggle="modal" data-target="#exampleModalEliminar<?php echo($i) ?>">
                                    <a class="text-danger" href="#" data-toggle="tooltip" title="Eliminar planta"><i class="fas fa-trash-alt mr-2"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#exampleModalEdit<?php echo($i) ?>">
                                    <a class="text-warning" href="#" data-toggle="tooltip" title="Editar planta" ng-click="updateIndex(<?php echo($result[$i]->IDRegion) ?>,<?php echo($result[$i]->IDComuna) ?>)"><i class="fas fa-edit"></i></a>
                                </span>          
                            </td>
                            <td> <?php echo($result[$i]->DescPrt) ?></td>
                            <td><?php echo($result[$i]->DescRegion) ?></td>
                            <td><?php echo(utf8_encode($result[$i]->DescProvincia)) ?></td>
                            <td><?php echo(utf8_encode($result[$i]->DescComuna)) ?></td>
                            <td><?php echo($result[$i]->DireccionPrt) ?></td>
                        </tr>
                        <?php endfor ?>
                    </tbody>
            </table>
            <!--Paginacion-->
            <div class="paginacion">
                <nav aria-label="..." class="float-right">
                    <ul class="pagination">
                        <li class="page-item <?php echo($_GET['pagina'] <= 1 ? 'disabled' : ''); ?>">
                            <a class="page-link" href="?pagina=<?php echo($_GET['pagina']-1); ?>">
                                Anterior
                            </a>
                        </li>
                        <?php for($i=0; $i<$paginas; $i++): ?>
                                <li class="page-item <?php echo($_GET['pagina'] == $i+1 ? 'active' : ''); ?>" >
                                    <a class="page-link" href="?pagina=<?php echo($i+1); ?>"> 
                                        <?php echo($i+1); ?> <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                        <?php endfor ?>   
                        
                        <li class="page-item <?php echo($_GET['pagina'] >= $paginas ? 'disabled' : ''); ?>">
                            <a class="page-link" href="?pagina=<?php echo $_GET['pagina']+1; ?>">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <style>
                /* Sticky footer styles
                -------------------------------------------------- */
                html {
                position: relative;
                min-height: 100%;
                }
                .paginacion {
                position: absolute;
                right:6%;
                bottom: 0;
                
                /* Set the fixed height of the footer here */
                height: 50px;
                line-height: 25px; /* Vertically center the text there */
                }
            </style>
            <!-- modal nueva planta -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Nueva Planta de Revisión tecnica</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddPlant" method="POST" autocomplete="off" action="./insertarPlanta.php">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" name="uName" class="form-control" id="nombre-usuario" required="">
                                    <div class="invalid-feedback">¡Debe ingeresar el nombre!</div>
                                </div>
                                <div class="row">
                                    <div class = "col">
                                        <div class="form-group">
                                            <label for="apellido-paterno" class="col-form-label">Región:</label>
                                            <select class="form-control" id="rol-usuario" required="" ng-model="regionSelec" ng-change="updateComunas(regionSelec)">
                                                <option ng-repeat="region in regiones"  
                                                    value="{{ region.id }}" 
                                                    ng-selected = "{{ region.id }}">
                                                    {{ region.nombre }}
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">¡Debe seleccionar una región!</div>
                                        </div>
                                    </div> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="comunaPrt" class="col-form-label">Comuna:</label>
                                            <select name="pComuna" class="form-control" id="comunaPrt" required="" ng-model="comunaSelec">
                                                <option ng-repeat="comuna in comunas"
                                                    value="{{ comuna.id }}"
                                                    ng-selected = "{{ comuna.id }}">
                                                    {{ comuna.nombre }}
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">¡Debe Seleccionar una comuna!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="col-form-label">Dirección:</label>
                                    <input type="text" name="pDir" class="form-control" id="direccion" required="">
                                    <div class="invalid-feedback">¡Debe ingresar la direccion de la panta en este campo!</div>
                                </div>
                                <div class="form-group">
                                    <label for="fono" class="col-form-label">Teléfono:</label>
                                    <input type="text" name="pTel" class="form-control" id="fono" required="">
                                    <div class="invalid-feedback">¡Debe ingresar el telefono de la planta en este campo!</div>
                                </div>
                                <div class="form-group d-none">
                                <input type="text" name="fecha" class="form-control" required="" value="{{ CurrentDate | date:'yyyy-dd-MM' }} {{ Hora }}:{{ Minutos }}:00" readonly>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnAddPlant" class="btn btn-primary" form="formAddPlant">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- validacion de campos -->
            <script>
                $("#btnAddPlant").click(function(event) {

                //Fetch form to apply custom Bootstrap validation
                var form = $("#formAddPlant")

                if (form[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.addClass('was-validated');
                });
                
            </script>

            <!-- modal Eliminar planta -->
            <?php for($i=0; $i < $totalResults; $i++): ?>
            <div class="modal fade" id="exampleModalEliminar<?php echo($i) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-minus-circle"></i> Eliminar Planta de Revisión tecnica</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formDeletePlant<?php echo($i) ?>" method="POST" autocomplete="off" action="./eliminarPrt.php" ng-app="dinamic" ng-controller="dinamicController">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre-usuario" required="" value="<?php echo($result[$i]->DescPrt) ?>" readonly>
                                    <div class="invalid-feedback">¡Debe ingeresar el nombre!</div>
                                </div>
                                <div class="form-group">
                                    <label for="comunaPrt" class="col-form-label">Comuna:</label>
                                    <input class="form-control" id="comunaPrt" required="" value="<?php echo($result[$i]->DescComuna) ?>" readonly>
                                    <div class="invalid-feedback">¡Debe Seleccionar una comuna!</div>
                                </div>                             
                                <div class="form-group">
                                    <label for="direccion" class="col-form-label">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" required="" value="<?php echo($result[$i]->DireccionPrt) ?>" readonly>
                                    <div class="invalid-feedback">¡Debe ingresar la direccion de la panta en este campo!</div>
                                </div>
                                <div class="form-group">
                                    <label for="fono" class="col-form-label">Teléfono:</label>
                                    <input type="text" class="form-control" id="fono" required="" value="<?php echo($result[$i]->FonoPrt) ?>" readonly>
                                    <div class="invalid-feedback">¡Debe ingresar el telefono de la planta en este campo!</div>
                                </div>
                                <div class="form-group d-none">
                                    <input type="text" name="pId" class="form-control" id="fono" required="" value="<?php echo($result[$i]->IDPrt) ?>" readonly>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnAddPlant" class="btn btn-danger" form="formDeletePlant<?php echo($i) ?>">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor ?>

            <!-- modal Editar planta -->
            <?php for($i=0; $i < $totalResults; $i++): ?>
            <div class="modal fade" id="exampleModalEdit<?php echo($i) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-edit"></i> Editar Planta de Revisión tecnica</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditPlant<?php echo($i) ?>" method="POST" autocomplete="off" action="./editarPrt.php" ng-app="dinamic" ng-controller="dinamicController">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre-usuario" required="" value="<?php echo($result[$i]->DescPrt) ?>">
                                    <div class="invalid-feedback">¡Debe ingeresar el nombre!</div>
                                </div>
                                <div class="row">
                                    <div class = "col">
                                        <div class="form-group">
                                            <label for="apellido-paterno" class="col-form-label">Región:</label>
                                            <select class="form-control" id="rol-usuario" required="" ng-model="regionSelec2" ng-change="updateComunas(regionSelec2)" st-search="target">
                                                <option ng-repeat="region in regiones"  
                                                    value="{{ region.id }}">
                                                    {{ region.nombre }}
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">¡Debe seleccionar una región!</div>
                                        </div>
                                    </div> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="comunaPrt" class="col-form-label">Comuna:</label>
                                            <select name="pComuna" class="form-control" id="comunaPrt" required="" ng-model="comunaSelec2">
                                                <option ng-repeat="comuna in comunas"
                                                    value="{{ comuna.id }}">
                                                    {{ comuna.nombre }}
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">¡Debe Seleccionar una comuna!</div>
                                        </div>
                                    </div>
                                </div>                           
                                <div class="form-group">
                                    <label for="direccion" class="col-form-label">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" required="" value="<?php echo($result[$i]->DireccionPrt) ?>">
                                    <div class="invalid-feedback">¡Debe ingresar la direccion de la panta en este campo!</div>
                                </div>
                                <div class="form-group">
                                    <label for="fono" class="col-form-label">Teléfono:</label>
                                    <input type="text" class="form-control" id="fono" required="" value="<?php echo($result[$i]->FonoPrt) ?>">
                                    <div class="invalid-feedback">¡Debe ingresar el telefono de la planta en este campo!</div>
                                </div>
                                <div class="form-group d-none">
                                    <input type="text" name="pId" class="form-control" id="fono" required="" value="<?php echo($result[$i]->IDPrt) ?>" readonly>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnAddPlant" class="btn btn-primary" form="formEditPlant<?php echo($i) ?>">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor ?>
        </main>
    </body>
</html>