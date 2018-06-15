<?php

require('../../DataManager/Data/conexion.php');

class UpdatePassword extends ConexionDatabase{

    function update($idusuario){
        $idReal=$idusuario;
        $connection = ConexionDatabase::connect();
    
        if($connection){
            
            $sqlQuery="update PasswordUsuario set PasswordUsuario='".$_POST['pwd1']."' where IDUsuarioPassword =".$idReal.";
            update PasswordUsuario set EstadoPassword = 1 where IDUsuarioPassword =".$idReal.";
            update DataUsuario set EstadoDatausuario = 1 where IDUsuarioDataUsuario =".$idReal.";";
    
            $statement = sqlsrv_query($connection, $sqlQuery);
        }
    
        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }else{
            sqlsrv_close($connection);
            header('Location: ../EndSession/end.php');
        }
    }
}

session_start();

if(empty($_SESSION['rol'])){
    header('Location: ../../app-authorized/EndSession/end.php');
}

$updateUsuario = new UpdatePassword;

if(!empty($_POST['pwd1']) & !empty($_POST['pwd2'])){
    $pw1 = $_POST['pwd1'];
    $pw2 = $_POST['pwd2'];
    if( $pw1 === $pw2){
        $updateUsuario -> update($_SESSION['id']);
    }
}else{
    session_start();
    $_SESSION['failUpdate'] = 1;
    header('Location: ../EndSession/end.php');
}
