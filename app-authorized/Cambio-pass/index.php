<!DOCTYPE html>
<html>
    <?php include('./../../master-page/header.php') ?>
<body>
    <?php include('./../../master-page/nav-bar.php') ?>

    <header class="mt-3">
        <h2 class="text-center">Cambio de contraseña</h2>
    </header>

    <section>
    <div class="container py-5"  ng-app="appAuth">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center flex-row-reverse justify-content-around">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="../../assets/img/logo_prt5.png" alt="Planta de revision tecnica">
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <!-- form card login -->
                                <div class="card rounded-2">
                                    <div class="card-header">
                                        <h3 class="mb-0">Nueva contraseña</h3>
                                    </div>
                                    <div class="card-body">
                                        <form name="formLogin" class="form" role="form" autocomplete="off" id="formData" novalidate="" ng-controller="appAuthController" method="POST" action="updatePassword.php">
                                            <div class="form-group">
                                                <label for="uname1">Contraseña</label>
                                                <input type="password" class="form-control form-control-lg rounded-0" id="uname1" name ="pwd1" required="" autocomplete="new-password" ng-model="uPwd">
                                                <div class="invalid-feedback">Ups, olvido ingresar la contraseña.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Repetir contraseña</label>
                                                <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="pwd2" required="" autocomplete="new-password" ng-model="uPwd2"> 
                                                <div class="invalid-feedback">¡Debe repetir su contraseña!</div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-lg float-right" id="btnData" ng-click="enviarDataCambioPass();" >Guardar</button>
                                        </form>
                                    </div>
                                <!--/card-block-->
                            </div>
                            <!-- /form card login -->
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
    </section>

    <?php include('./../../master-page/sticky-footer.php') ?>
    <?php include('./../../master-page/imports.php') ?>
</body>
</html>