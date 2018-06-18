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
?>
<!DOCTYPE html>
<html>
    <?php include('../../../master-page-lvl3/header-admin.php') ?>
    <body>
        <?php include('../../../master-page-lvl3/nav-admin.php') ?>
        <main class="container">
        <script>
            angular.module('dinamic', [])
            .controller('dinamicController',['$scope','$http', function($scope, $http){
                var arrayRegiones = [];
                var arrayProvincias = [];
                var arrayComunas = [];
                var provinciaRegion =[];
                var comunaFiltrada=[];
                <?php for($x=0; $x< $countRegiones; $x++): ?>
                        arrayRegiones.push({id : '<?php echo($regiones[$x]->IDRegion) ?>', nombre: '<?php echo($regiones[$x]->DescRegion) ?>'});
                <?php endfor ?>
                <?php for($x=0; $x< $countProvincias; $x++): ?>
                        arrayProvincias.push({id : '<?php echo($provincias[$x]->IDProvincia) ?>', nombre: '<?php echo($provincias[$x]->DescProvincia) ?>', rProvincia:'<?php echo($provincias[$x]->RegionProvincia) ?>'});
                <?php endfor ?>
                <?php for($x=0; $x< $countComunas; $x++): ?>
                        arrayComunas.push({id : '<?php echo($comunas[$x]->IDComuna) ?>', nombre: '<?php echo($comunas[$x]->DescComuna) ?>', pComuna:'<?php echo( $comunas[$x]->ProvinciaComuna) ?>' });
                <?php endfor ?>
                
                $scope.regiones = arrayRegiones;
                $scope.regionSelec;

                for(provincia in arrayProvincias)
                {
                    if(provincia.rProvincia == $scope.regionSelec){
                        provinciaRegion.push(provincia);
                    }
                        
                }

                

                $scope.comunas = comunaFiltrada;
                $scope.comunaSelec = provinciaRegion;
                
            }]);
        </script>
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
                                <span data-toggle="modal" data-target="#exampleModal <?php echo($i) ?>">
                                    <a class="text-danger" href="#" data-toggle="tooltip" title="Eliminar planta"><i class="fas fa-trash-alt mr-2"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#exampleModalEdit <?php echo($i) ?>">
                                    <a class="text-warning" href="#" data-toggle="tooltip" title="Editar planta"><i class="fas fa-edit"></i></a>
                                </span>          
                            </td>
                            <td> <?php echo($result[$i]->DescPrt) ?></td>
                            <td><?php echo($result[$i]->DescRegion) ?></td>
                            <td><?php echo($result[$i]->DescProvincia) ?></td>
                            <td><?php echo($result[$i]->DescComuna) ?></td>
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
                            <form id="formAddPlant" method="POST" autocomplete="off" action="" ng-app="dinamic" ng-controller="dinamicController">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" name="uName" class="form-control" id="nombre-usuario" required="">
                                    <div class="invalid-feedback">¡Debe ingeresar el nombre!</div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-paterno" class="col-form-label">Región:</label>
                                    <select class="form-control" id="rol-usuario" required="" ng-model="regionSelec">
                                        <option ng-repeat="region in regiones"  
                                            value="{{ region.id }}" 
                                            ng-selected = "{{ region.id }}">
                                            {{ region.nombre }}
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">¡Debe ingeresar el apellido!</div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-paterno" class="col-form-label">Comuna:</label>
                                    <select class="form-control" id="rol-usuario" required="" ng-model="comunaSelec" >
                                        <option ng-repeat="comuna in comunas track by $index"
                                            value="{{ comuna.id }}">
                                            {{ comuna.nombre }}
                                        </option>
                                    </select>
                                    {{ comunaSelec.id }}
                                    <div class="invalid-feedback">¡Debe ingeresar el apellido!</div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-materno" class="col-form-label">E-mail:</label>
                                    <input type="email" name="uMail" class="form-control" id="apellido-materno" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    <div class="invalid-feedback">¡Debe ingeresar un e-mail valido!</div>
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
        </main>
    </body>
</html>