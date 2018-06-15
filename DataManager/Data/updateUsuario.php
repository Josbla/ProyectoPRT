<?php

require('consultas.php');

class UpdateUsuario extends ConexionDatabase{

    function update($idusuario){
        $consulta = new Consultas;
        $idReal=$consulta->getIDUsuarioPorEmail($idusuario);
        $connection = ConexionDatabase::connect();
    
        if($connection){
            
            $rol = strtoupper($_POST['uRol']);
            $nombre = strtoupper($_POST['uName']);
            $apePat = strtoupper($_POST['uApePat']);
            $apeMat = strtoupper($_POST['uApeMat']);
            $sqlQuery="update Usuarios set RolUsuario =".$rol." where IDUsuario= '".$idReal."';
            update DataUsuario set NombreUsuario ='".$nombre."' where IDUsuarioDataUsuario = '".$idReal."';
            update DataUsuario set ApellidoPaternoUsuario ='".$apePat."' where IDUsuarioDataUsuario = '".$idReal."';
            update DataUsuario set ApellidoMaternoUsuario = '".$apeMat."' where IDUsuarioDataUsuario = '".$idReal."';";
    
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

$updateUsuario = new UpdateUsuario;

if(!empty($_POST['uMail']) & !empty($_POST['uName']) & !empty($_POST['uApePat']) & !empty($_POST['uApeMat']) & !empty($_POST['uRol'])){
    $updateUsuario -> update($_POST['uMail']);
}else{
    session_start();
    $_SESSION['failUpdate'] = 1;
    header('Location: ../../app-authorized/Principal');
}
    