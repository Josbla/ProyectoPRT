<!DOCTYPE html>
<html>
    <?php include('./../../master-page/header.php'); ?>
<body>
    <?php include('./../../master-page/nav-bar.php'); ?>

    <header class="mt-3">
        <h2 class="text-center">Bienvenido <?php echo($_SESSION['nombre'].' '.$_SESSION['apellido']); ?></h2>
    </header>

    <section>
        <div class="container py-5"  ng-app="appAuth">
            <h2>Estaciones</h2>
            <div class="row">
                <div class= "col-6">
                    
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-light btn-lg text-dark" href="./ingresoPrt"><i class="far fa-address-card"> Identificación del vehículo</i></a>
                    </div>
                </div>
                <br>
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <a class="btn btn-danger btn-lg text-light" href="./ingresoPrt"><i class="fas fa-eye"></i> Inspeción visual</i></a>
                    </div>
                </div>

                </div>
                <div class= "col-6">

                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <a class="btn btn-primary btn-lg text-light" href="./ingresoPrt"><i class="fas fa-lightbulb"></i> Luces</a>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                        <a class="btn btn-light btn-lg light" href="./ingresoPrt"><i class="fas fa-car"></i> Alineación</a>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="card bg-info text-white">
                <div class="card-body">
                    <a class="btn btn-info btn-lg light" href="./ingresoPrt"><i class="fas fa-syringe"></i> Suspensión</a>
                </div>
            </div>
        </div>
    </section>

    <?php include('./../../master-page/sticky-footer.php') ?>
    <?php include('./../../master-page/imports.php') ?>
</body>
</html>