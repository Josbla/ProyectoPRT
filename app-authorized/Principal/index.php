<?php
    include('../../DataManager/Data/consultas.php');
    session_start();
    $userAdmin = $_SESSION['rol'];

    if ($userAdmin!='ADMINISTRADOR'){
        $_SESSION['fail']='true';
        header('Location: ../../app-unauthorized/Principal');
    }

    if(!empty($_SESSION['failInsert'])){
        if($_SESSION['failInsert']==1){
            echo('<script>
                alert("Error: vuelva a intentarlo mas tarde.");
            </script>');
            $_SESSION['failInsert']=0;
        }
    }

    if(!empty($_SESSION['failUpdate'])){

        if($_SESSION['failUpdate'] == 1){
            echo('<script>
                alert("Error: Se intento actualizar un usuario con campos vacios .");
            </script>');
            $_SESSION['failUpdate']=0;
        }
    }

        $consulta = new Consultas;
        $result = $consulta->listarUsuarios();
        $resultRoles = $consulta->getRolesDeUsuario();
        $resultPlantas = $consulta->getPlantas();
        $countRoles = 0;
        $countPlantas = 0;
        $resultXPag = 10;
        $totalResults=count($result);
        $paginas = ceil($totalResults/$resultXPag);
        $iniciar = ($_GET['pagina']-1)*$resultXPag;
        $finalizar = ($iniciar+$resultXPag);
?>
<!DOCTYPE html>
<html>
    <?php include('../../master-page/header-admin.php') ?>
    <body>
        <?php include('../../master-page/nav-admin.php') ?>
        <?php 
            if(!$_GET){
                header('Location: ./?pagina=1');
            }

            if($_GET['pagina'] > $paginas || $_GET['pagina'] < 1){
                header('Location: ./?pagina=1');
            }
        ?>
        <main class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Nuevo usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddUser" method="POST" autocomplete="off" action="../../DataManager/Data/inserts.php">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" name="uName" class="form-control" id="nombre-usuario" required="">
                                    <div class="invalid-feedback">¡Debe ingeresar el nombre!</div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-paterno" class="col-form-label">Apellido Paterno:</label>
                                    <input type="text" name="uApePat" class="form-control" id="apellido-paterno" required="">
                                    <div class="invalid-feedback">¡Debe ingeresar el apellido!</div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-materno" class="col-form-label">Apellido Materno:</label>
                                    <input type="text" name="uApeMat" class="form-control" id="apellido-materno" required="">
                                    <div class="invalid-feedback">¡Debe ingeresar el apellido!</div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-materno" class="col-form-label">E-mail:</label>
                                    <input type="email" name="uMail" class="form-control" id="apellido-materno" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    <div class="invalid-feedback">¡Debe ingeresar un e-mail valido!</div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="planta-usuario" class="col-form-label">Planta:</label>
                                            <select class="form-control" name="uPrt" id="planta-usuario" required="">
                                                <?php 
                                                    foreach($resultPlantas as $planta){
                                                        echo('<option value="'.$resultPlantas[$countPlantas]->IDPrt.'">'.$resultPlantas[$countPlantas]->DescPrt.'</option>');
                                                        $countPlantas++;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "col">    
                                        <div class="form-group">
                                            <label for="rol-usuario" class="col-form-label">Rol:</label>
                                            <select class="form-control" name="uRol" id="rol-usuario" required="">
                                                <?php 
                                                    foreach($resultRoles as $rol){
                                                        echo('<option value="'.$resultRoles[$countRoles]->IDRolUsuario.'">'.$resultRoles[$countRoles]->DescRolUsuario.'</option>');
                                                        $countRoles++;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>    
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnAddUser" class="btn btn-primary" form="formAddUser">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Paginacion-->
            <div class="row mt-5">
                <div class="col">
                    <a class="nav-link text-success font-weight-bold" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i> Nuevo funcionario</a>
                </div>
                <div class="col">
                    <span class="font-weight-bold">Usuarios</span>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Planta</th>
                    </tr>
                </thead>
                <tbody>

                <?php 

                    if (empty($result)){
                        echo ('<span class="h3" style="position: relative;margin-top: 0px;top: 30px;"> No existe Data</span>');
                    }else {
                        if($finalizar > $totalResults){
                            $finalizar = $totalResults;
                        }
                        for ($i = $iniciar; $i< $finalizar; $i++) {
                            echo('<tr>
                            <th scope="row">'.($i+1).'</th>
                            <td>
                                <span data-toggle="modal" data-target="#exampleModal'.$i.'">
                                    <a class="text-danger" href="#" data-toggle="tooltip" title="Eliminar usuario"><i class="fas fa-trash-alt mr-2"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#exampleModalEdit'.$i.'">
                                    <a class="text-warning" href="#" data-toggle="tooltip" title="Editar usuario"><i class="fas fa-user-edit"></i></a>
                                </span>          
                            </td>
                            <td>'.$result[$i]->NombreUsuario.'</td>
                            <td>'.$result[$i]->ApellidoPaternoUsuario.'</td>
                            <td>'.$result[$i]->CorreoElectronicoUsuario.'</td>
                            <td>'.$result[$i]->DescRolUsuario.'</td>
                            <td>'.$result[$i]->DescPrt.'</td>
                            </tr>
    
                            <div class="modal fade" id="exampleModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-times"></i> Eliminar usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formDataE'.$i.'" action="../../DataManager/Data/Eliminar.php" method="POST">
                                    <div class="form-group">
                                        <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                        <input type="text" name="uName" class="form-control" id="nombre-usuario" value="'.$result[$i]->NombreUsuario.'" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido-paterno" class="col-form-label">Apellido Paterno:</label>
                                        <input type="text" name="uApePat" class="form-control" id="apellido-paterno" value="'.$result[$i]->ApellidoPaternoUsuario.'" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email-user" class="col-form-label">E-mail:</label>
                                        <input type="email" name="uMail" class="form-control" id="email-user" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="'.$result[$i]->CorreoElectronicoUsuario.'" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="planta-usuario" class="col-form-label">Planta:</label>
                                        <input type="text" name="uPrt" class="form-control" id="planta-usuario" value="'.$result[$i]->DescPrt.'" readonly>                
                                    </div>
                                    <div class="form-group">
                                        <label for="rol-usuario" class="col-form-label">Rol:</label>
                                        <input type="text" name="uRol" class="form-control" id="rol-usuario" value="'.$result[$i]->DescRolUsuario.'" readonly>                
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btnData" class="btn btn-danger" form="formDataE'.$i.'">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="modal fade" id="exampleModalEdit'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i> Actualizar usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formDataEdit'.$i.'" action="../../DataManager/Data/updateUsuario.php" method="POST">
                                    <div class="form-group">
                                        <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                        <input type="text" name="uName" class="form-control" id="nombre-usuario" value="'.$result[$i]->NombreUsuario.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido-paterno" class="col-form-label">Apellido Paterno:</label>
                                        <input type="text" name="uApePat" class="form-control" id="apellido-paterno" value="'.$result[$i]->ApellidoPaternoUsuario.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido-materno" class="col-form-label">Apellido Materno:</label>
                                        <input type="text" name="uApeMat" class="form-control" id="apellido-materno" value="'.$result[$i]->ApellidoMaternoUsuario.'" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email-user" class="col-form-label">E-mail:</label>
                                        <input type="email" name="uMail" class="form-control" id="email-user" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="'.$result[$i]->CorreoElectronicoUsuario.'" readonly required>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="planta-usuario" class="col-form-label">Planta:</label>
                                                <select class="form-control" name="uPrt" id="planta-usuario" required="">');
                                                        $countPlantas = 0;
                                                        foreach($resultPlantas as $planta){
                                                            if($resultPlantas[$countPlantas]->DescPrt == $result[$i]->DescPrt){
                                                                echo('<option value="'.$resultPlantas[$countPlantas]->IDPrt.'" selected>'.$resultPlantas[$countPlantas]->DescPrt.'</option>');
                                                            }else{
                                                                echo('<option value="'.$resultPlantas[$countPlantas]->IDPrt.'">'.$resultPlantas[$countPlantas]->DescPrt.'</option>');
                                                            }
                                                            $countPlantas++;
                                                        }
                                            echo('</select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="rol-usuario" class="col-form-label">Rol:</label>
                                                <select class="form-control" name="uRol" id="rol-usuario" required="">'); 
                                                        $countRoles=0;
                                                        foreach($resultRoles as $rol){
                                                            if($resultRoles[$countRoles]->DescRolUsuario == $result[$i]->DescRolUsuario){
                                                                echo('<option value="'.$resultRoles[$countRoles]->IDRolUsuario.'" selected>'.$resultRoles[$countRoles]->DescRolUsuario.'</option>');
                                                            }else{
                                                                echo('<option value="'.$resultRoles[$countRoles]->IDRolUsuario.'">'.$resultRoles[$countRoles]->DescRolUsuario.'</option>');
                                                            }
                                                            $countRoles++;
                                                        }
                                                echo('</select>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btnData" class="btn btn-primary" form="formDataEdit'.$i.'">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                            ');
                        }
                    }
                ?>
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
            <script>
                $("#btnAddUser").click(function(event) {

                //Fetch form to apply custom Bootstrap validation
                var form = $("#formAddUser")

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

