<!DOCTYPE html>
<html>
<?php include('./../../../master-page-lvl3/header.php') ?>
<body>
    <?php include('./../../../master-page-lvl3/nav-bar.php') ?>
    <!-- CONTENIDO SITIO -->
    <div class="container">
        <header class="mt-3">
            <h2 class="text-center">Alineación</h2>
        </header>
        <section>
        <div class="row">
            <div class="col-sm-3"></div>
            </div class="col-sm-6">
                <form action="" method="" class="mt-5">
                    <hr style="width:100%;">
                    
                    <div class="container d-flex mt-5">
                        <!-- inicio alineacion -->
                        <div class="col-sm-12">
                            <span class="h4">Alineación</span>

                            <div class="mt-5 d-flex flex-column">                   
                                <span>Ingrese el valor obtenido en la prueba de alineación</span>                   

                                <div class="d-flex col-sm-4">
                                    <input class="form-control align-self-center" type="text" name="txtresultadorueda" style="margin-top: 10px;"/>
                                </div>  
                            </div>  

                            <div class="mt-3 d-flex flex-column">                   
                                <span>¿La alineación es correcta?</span>                    
                                <div class="d-flex">
                                    <input class="radio turq align-self-center" type="radio" name="rdoruedas" value="si" style="margin-top: 10px;"/>
                                    <span class="align-self-center">Sí</span>
                                </div>                   
                                <div class="d-flex">
                                    <input class="radio red align-self-center" type="radio" name="rdoruedas" value="no"style="margin-top: 10px;"/>
                                    <span class="align-self-center">No</span>
                                </div>
                            </div>
                            <!-- fin alineacion -->
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex mt-5">
                        <div class="col-sm-4">
                            <a href="./../" class="btn btn-primary btn-lg btn-block">GUARDAR</a>
                        </div>
                    </div>
                </form>
            <div>
            <div class="col-sm-3 d-flex justify-content-between flex-column"></div>
        </div>
       
        </section>
    </div>
        <!-- FIN CONTENIDO -->
        <?php include('./../../../master-page-lvl3/footer.php') ?>
        <?php include('./../../../master-page-lvl3/imports.php') ?>
    </body>
    </html>
