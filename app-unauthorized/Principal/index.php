<!DOCTYPE html>
<html ng-app="appAuth">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Planta de revión tecnica</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <?php 
        session_start();
        if(isset($_SESSION['fail'])){
            if($_SESSION['fail']=='true'){
                echo '<script> alert("usuario o contraseña incorrecto")</script>';
                $_SESSION['fail']='false';
            }
        }

        
    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="float-right">
                <a class="navbar-brand" href="#"><img src="../../assets/img/logo_prt5.png" alt="Planta de revision tecnica" height="56" width="180"></a>
            </div>
        </nav>

            <div class="container py-5">
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
                                        <h3 class="mb-0">Inicio de sesión</h3>
                                    </div>
                                    <div class="card-body">
                                        <form name="formLogin" class="form" role="form" autocomplete="off" id="formData" novalidate="" ng-controller="appAuthController" method="POST" action="../../DataManager/Data/autenticacion.php">
                                            <div class="form-group">
                                                <label for="uname1">Nombre de usuario</label>
                                                <input type="text" class="form-control form-control-lg rounded-0" id="uname1" name ="uname1" required="" ng-model="uName">
                                                <div class="invalid-feedback">Ups, olvido ingresar su nombre de usuario.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="pwd1" required="" autocomplete="new-password" ng-model="uPwd"> 
                                                <div class="invalid-feedback">¡Debe ingeresar su contraseña tambien!</div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-lg float-right" id="btnData" ng-click="enviarData();" >Autenticar</button>
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
        <!--/container-->
        <footer class="footer mt-5 bg-light">
          <div class="container d-flex ">
             <div class="col-sm-7 pt-3">
                 <div>
                     <span class="text-muted">Télefono: +56 9 12345678</span>
                 </div>
                 <div>
                     <span class="text-muted">Dirección: Calle Falsa #123</span>
                 </div>
                 <div>
                     <span class="text-muted">prt@metropolitana.cl</span>
                 </div>
             </div>       
             <div class="col-sm-5 d-flex justify-content-end">
                 <span class="text-muted align-self-center" style="padding-right: 10px;">Powered by <b>NKSoft</b> </span>
             </div>
            
          </div>
        </footer>   
        <link rel="stylesheet" type="text/css" media="screen" href="../../assets/bootstrap/css/bootstrap.css" />
        <script src="../../assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../assets/bootstrap/js/bootstrap.js"></script>
        <script src="../../assets/CryptoJSv3.1.2/components/core-min.js"></script>
        <script src="../../assets/CryptoJSv3.1.2/components/x64-core-min.js"></script>
        <script src="../../assets/CryptoJSv3.1.2/components/sha3-min.js"></script>
        <script src="../../assets/extensiones/extensiones.js"></script>
        <script src="../../assets/angular/angular.js"></script>
        <script src="./appauth.js"></script>  

        <style>
            /* Sticky footer styles
            -------------------------------------------------- */
            html {
              position: relative;
              min-height: 100%;
            }
            .footer {
              position: absolute;
              bottom: 0;
              width: 100%;
              /* Set the fixed height of the footer here */
              height: 105px;
              line-height: 25px; /* Vertically center the text there */
              background-color: #f5f5f5;
            }
        </style>
    </body>
</html>

