<!DOCTYPE html>
<html>
    <?php include('./../../../master-page-lvl3/header.php'); ?>
<body>
    <?php include('./../../../master-page-lvl3/nav-bar.php'); ?>

    <div class="container col-sm-9">
        <header class="mt-5">
        <h2 class="text-center">Bienvenido <?php echo(ucfirst(strtolower($_SESSION['nombre'])).' '.ucfirst(strtolower($_SESSION['apellido']))); ?></h2>
        </header>
        <section>

            <div class="card container d-flex flex-column mt-5 bordes">
                <span class="h3 px-3 mt-3">Etapas</span>
                <hr>
                <div class="mt-3 d-flex">
                    <div class="col-sm-6">
                        <a href="./iv-vidriosparabrisas" class="link d-flex align-items-center justify-content-center btn btn-block bg-secondary btn-dashboard size-text-btn text-negro">
                            Vidrios y Parabrisas
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="./iv-lentesmicas" class="link d-flex align-items-center justify-content-center btn btn-block bg-secondary btn-dashboard size-text-btn text-negro" >
                            Lentes y Micas
                        </a>
                    </div>
                </div>

                <div class="mt-3 d-flex">
                    <div class="col-sm-6">
                        <a href="./iv-retrovisores" class="link d-flex align-items-center justify-content-center btn btn-block bg-secondary btn-dashboard size-text-btn text-negro">
                            Retrovisores
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="./iv-asientos" class="link d-flex align-items-center justify-content-center btn btn-block bg-secondary btn-dashboard size-text-btn text-negro">
                          Asientos
                        </a>
                    </div>
                </div>
                <div class="mt-3 d-flex">
                    <div class="col sm 12">
                        <a href="./iv-cinturonseguridad" class="link d-flex align-items-center justify-content-center col-sm-12 btn btn-block mb-4 btn-dashboard size-text-btn bg-secondary text-negro">
                            Cinturones de seguridad
                        </a>
                    </div>                    
                </div>
            </div>
        </section>
    </div>

    <?php include('./../../../master-page-lvl3/footer.php') ?>
    <?php include('./../../../master-page-lvl3/imports.php') ?>

    <style>
            .btn-dashboard{
                height: 70px;
            }

            .link:hover{
                background-color: #2c3e50;
                color: #fff;
            }

            .size-text-btn{
                font-size: 1.3rem;
            }

            .bordes{
                border: 0px transparent;
            }
            
            .text-negro{
                color: #000;
            }
        </style>
</body>
</html>