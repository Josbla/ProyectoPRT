<?php 
    session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="float-right">
        <a class="navbar-brand" href="#"><img src="../../../assets/img/logo_prt5.png" alt="Planta de revision tecnica" height="56" width="180"></a>
        <?php 
            if(!empty($_SESSION['id'])){
                echo('<div class="float-right">
                <a class="btn btn-danger btn-lg text-light" href="../../../app-authorized/EndSession/end.php">cerrar sesión</a>
            </div>');
            }
        ?>
    </div>
</nav>