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
        $countUser = 0;
        $countRoles = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bienvennido <?php echo( $_SESSION['nombre']);?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../../assets/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../../assets/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" />
        <script src="../../assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../assets/bootstrap/js/bootstrap.js"></script>
        <script src="../../assets/extensiones/extensiones.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="../../assets/img/logo_prt5.png" alt="Planta de revision tecnica" height="56" width="180"></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Administrador de usuarios <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i> Nuevo usuario</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>   
            <div>
                <a class="btn btn-danger btn-lg float-right text-light" href="../EndSession/end.php">cerrar sesión</a>
            </div>
        </nav>
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
                            <form id="formData" method="POST" autocomplete="off" action="../../DataManager/Data/inserts.php">
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
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnData" class="btn btn-primary" form="formData">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    foreach ($result as $usuario) {
                        echo('<tr>
                        <th scope="row">'.($countUser+1).'</th>
                        <td>'.$result[$countUser]->NombreUsuario.'</td>
                        <td>'.$result[$countUser]->ApellidoPaternoUsuario.'</td>
                        <td>'.$result[$countUser]->CorreoElectronicoUsuario.'</td>
                        <td>'.$result[$countUser]->DescRolUsuario.'</td>
                        <td>
                            <a class="btn btn-danger btn-lg text-light" href="#" data-toggle="modal" data-target="#exampleModal'.$countUser.'"><i class="fas fa-trash-alt mr-2"></i></a>
                            <a class="btn btn-warning btn-lg text-light" href="#" data-toggle="modal" data-target="#exampleModalEdit'.$countUser.'"><i class="fas fa-user-edit"></i></a>
                        </td>
                        </tr>

                        <div class="modal fade" id="exampleModal'.$countUser.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-times"></i> Eliminar usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formDataE'.$countUser.'" action="../../DataManager/Data/Eliminar.php" method="POST">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" name="uName" class="form-control" id="nombre-usuario" value="'.$result[$countUser]->NombreUsuario.'" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-paterno" class="col-form-label">Apellido Paterno:</label>
                                    <input type="text" name="uApePat" class="form-control" id="apellido-paterno" value="'.$result[$countUser]->ApellidoPaternoUsuario.'" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email-user" class="col-form-label">E-mail:</label>
                                    <input type="email" name="uMail" class="form-control" id="email-user" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="'.$result[$countUser]->CorreoElectronicoUsuario.'" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="rol-usuario" class="col-form-label">Rol:</label>
                                    <input type="text" name="uRol" class="form-control" id="rol-usuario" value="'.$result[$countUser]->DescRolUsuario.'" readonly>                
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnData" class="btn btn-danger" form="formDataE'.$countUser.'">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModalEdit'.$countUser.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i> Actualizar usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formDataEdit'.$countUser.'" action="../../DataManager/Data/updateUsuario.php" method="POST">
                                <div class="form-group">
                                    <label for="nombre-usuario" class="col-form-label">Nombre:</label>
                                    <input type="text" name="uName" class="form-control" id="nombre-usuario" value="'.$result[$countUser]->NombreUsuario.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-paterno" class="col-form-label">Apellido Paterno:</label>
                                    <input type="text" name="uApePat" class="form-control" id="apellido-paterno" value="'.$result[$countUser]->ApellidoPaternoUsuario.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido-materno" class="col-form-label">Apellido Materno:</label>
                                    <input type="text" name="uApeMat" class="form-control" id="apellido-materno" value="'.$result[$countUser]->ApellidoMaternoUsuario.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="email-user" class="col-form-label">E-mail:</label>
                                    <input type="email" name="uMail" class="form-control" id="email-user" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="'.$result[$countUser]->CorreoElectronicoUsuario.'" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="rol-usuario" class="col-form-label">Rol:</label>
                                    <select class="form-control" name="uRol" id="rol-usuario" required="">'); 
                                            $countRoles=0;
                                            foreach($resultRoles as $rol){
                                                echo('<option value="'.$resultRoles[$countRoles]->IDRolUsuario.'">'.$resultRoles[$countRoles]->DescRolUsuario.'</option>');
                                                $countRoles++;
                                            }
                                    echo('</select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnData" class="btn btn-primary" form="formDataEdit'.$countUser.'">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
                        ');
                        $countUser++;
                    }
                ?>
                </tbody>
            </table>
        </main>
    </body>
</html>

