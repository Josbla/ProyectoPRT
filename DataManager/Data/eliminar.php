<?php

require('consultas.php');

class EliminarUsuario extends ConexionDatabase{

    function eliminar($idusuario){
        $consulta = new Consultas;
        $idReal=$consulta->getIDUsuarioPorEmail($idusuario);
        $connection = ConexionDatabase::connect();
    
        if($connection){
            
            $sqlQuery="update Usuarios set EstadoUsuario =2 where IDUsuario=".$idReal.";
            update DataUsuario set EstadoDatausuario =2 where IDUsuarioDataUsuario =".$idReal.";
            update PasswordUsuario set EstadoPassword =2 where IDUsuarioPassword = ".$idReal.";";
    
            $statement = sqlsrv_query($connection, $sqlQuery);
        }
    
        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }else{
            sqlsrv_close($connection);
            header('Location: ../../app-authorized/Principal');
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

$eliminar = new EliminarUsuario;
if(!empty($_POST['uMail'])){
    $eliminar -> eliminar($_POST['uMail']);
}
    


