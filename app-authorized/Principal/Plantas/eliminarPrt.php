<?php

require('../../../DataManager/Data/consultas.php');

class EliminarPrt extends ConexionDatabase{

    function eliminar($idusuario){
        $connection = ConexionDatabase::connect();
    
        if($connection){
            
            $sqlQuery="DELETE FROM PlantaRevisionTecnica WHERE IDPrt =".$idusuario.";";
    
            $statement = sqlsrv_query($connection, $sqlQuery);
        }
    
        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }else{
            sqlsrv_close($connection);
            header('Location: ../../../app-authorized/Principal/Plantas');
        }
    }
}

session_start();

if(!empty($_SESSION['rol'])){
    $userAdmin = $_SESSION['rol'];
    if ($userAdmin!='ADMINISTRADOR'){
        header('Location: ../../app-authorized/EndSession/end.php');
    }
}

$eliminar = new EliminarPrt;
if(!empty($_POST['pId'])){
    $eliminar -> eliminar($_POST['pId']);
}
    