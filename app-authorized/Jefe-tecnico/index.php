<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bienvennido <?php echo( $_SESSION['nombre']);?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="../../../assets/img/logo_prt5.png" alt="Planta de revision tecnica" height="56" width="180"></a>
            <a class="btn btn-danger btn-lg float-right text-light" href="../../EndSession/end.php">cerrar sesión</a>
        </nav>

        <link rel="stylesheet" type="text/css" media="screen" href="../../../assets/bootstrap/css/bootstrap.css" />
        <script src="../../../assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../../assets/bootstrap/js/bootstrap.js"></script>
    </body>
</html>