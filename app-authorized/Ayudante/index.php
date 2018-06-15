<!DOCTYPE html>
<html>
    <?php include('./../../master-page/header.php'); ?>
<body>
    <?php include('./../../master-page/nav-bar.php'); ?>

    <div class="container col-sm-9">
        <header class="mt-5">
        <h2 class="text-center">Bienvenido <?php echo(ucfirst(strtolower($_SESSION['nombre'])).' '.ucfirst(strtolower($_SESSION['apellido']))); ?></h2>
        </header>
        <section>

            <div class="card container d-flex flex-column mt-5 bordes">
                <span class="h3 px-3 mt-3">Estaciones</span>
                <hr>
                <div class="mt-3 d-flex">
                    <div class="col-sm-6">
                        <a href="./ingresoPRT" class="d-flex align-items-center justify-content-center btn btn-block btn-dashboard size-text-btn bg-celeste text-negro">
                            <i class="far fa-address-card"></i>
                            Identificación del vehículo
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="./#" class="d-flex align-items-center justify-content-center btn btn-block btn-dashboard size-text-btn bg-purple text-negro" >
                            <i class="far fa-lightbulb"></i>
                            Luces
                        </a>
                    </div>
                </div>

                <div class="mt-3 d-flex">
                    <div class="col-sm-6">
                        <a href="./#" class=" d-flex align-items-center justify-content-center btn btn-block btn-dashboard size-text-btn bg-verde text-negro">
                            <i class="far fa-eye"></i>
                            Inspeccion visual
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="./#" class="d-flex align-items-center justify-content-center btn btn-block btn-dashboard size-text-btn bg-amarillo text-negro">
                            <i class="fas fa-tape"></i>
                            Alineación
                        </a>
                    </div>
                </div>
                <div class="mt-3 d-flex">
                    <div class="col sm 12">
                        <a href="./#" class="d-flex align-items-center justify-content-center col-sm-12 btn btn-block mb-4 btn-dashboard size-text-btn bg-mgpurple text-negro">
                            <i class="fas fa-arrows-alt-v"></i>
                            <i class="fas fa-arrows-alt-v"></i>
                            Sistema de suspención
                        </a>
                    </div>                    
                </div>
            </div>
        </section>
    </div>

    <?php include('./../../master-page/footer.php') ?>
    <?php include('./../../master-page/imports.php') ?>

    <style>
            .btn-dashboard{
                height: 70px;
            }

            a:hover{
                background-color: #2c3e50;
                color: #fff;
            }

            .size-text-btn{
                font-size: 1.3rem;
            }

            .bordes{
                border: 0px transparent;
            }

            .bg-amarillo {
                background-color: #fbc531;
            }

            .bg-mgpurple{
                background-color: #6D214F;
            }

            .bg-celeste{
                background-color: #74b9ff;
            }

            .bg-verde{
                background-color: #2ecc71;
            }

            .bg-purple{
                background-color: #9b59b6;
            }

            .text-negro{
                color: #000;
            }
        </style>
</body>
</html>