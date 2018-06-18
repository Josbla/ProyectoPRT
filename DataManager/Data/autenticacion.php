<?php

require('conexion.php');

class Autenticacion extends ConexionDatabase{

    var $userName;
    var $password;
    var $connection;
    var $usuario;
    function autenticar(){
        
        $_SESSION['fail']='false';
        $userName=strtoupper($_POST['uname1']);
        $password=$_POST['pwd1'];

        if($userName!=null && $password!=null){
            $connection = ConexionDatabase::connect();
            if($connection){
                $sqlQuery="select IDUsuario, NombreUsuario, ApellidoPaternoUsuario, DescRolUsuario, EstadoPassword, IDPrt 
                from Usuarios inner join DataUsuario on IDUsuario = IDUsuarioDataUsuario
                and CorreoElectronicoUsuario = '".$userName."'
                inner join RolesUsuario on RolUsuario = IDRolUsuario
                inner join PasswordUsuario on IDUsuario = IDUsuarioPassword
                and PasswordUsuario = '".$password."'
				inner join PlantaRevisionTecnica on IDPrt = PlantaUsuario;";
                
                $statement = sqlsrv_query($connection, $sqlQuery);
                if(!$statement){
                    echo('Ocurrio el siguiente error: ');
                    die( print_r( sqlsrv_errors(), true));
                }

                $rows = sqlsrv_has_rows($statement);

                if($rows){
                    $usuario = sqlsrv_fetch_object($statement);
                }else{
                    $usuario=null;
                    $_SESSION['fail']='true';
                    header('Location: ../../app-unauthorized/Principal');
                } 
            }
            sqlsrv_close($connection);
        }
        return $usuario;
    }  
}
$auth = new Autenticacion;
$result = $auth->autenticar();
session_start();
$_SESSION['id'] = $result->IDUsuario;
$_SESSION['nombre'] = $result->NombreUsuario;
$_SESSION['apellido'] = $result->ApellidoPaternoUsuario;
$_SESSION['rol'] = $result->DescRolUsuario;
$_SESSION['estado-pwd'] = $result->EstadoPassword;
$_SESSION['idPrt'] = $result->IDPrt;

if($_SESSION['estado-pwd'] == 3){
    header('Location: ../../app-authorized/Cambio-pass');
}elseif ($_SESSION['estado-pwd'] == 2) {
    header('Location: ../../app-unauthorized/Cuenta-desac');
}elseif($_SESSION['rol']=='ADMINISTRADOR'){
    header('Location: ../../app-authorized/Principal');
}elseif($_SESSION['rol']=='JEFE TECNICO'){
    header('Location: ../../app-authorized/Jefe-tecnico');
}elseif($_SESSION['rol']=='MECANICO'){
    header('Location: ../../app-authorized/Mecanico');
}elseif($_SESSION['rol']=='AYUDANTE'){
    header('Location: ../../app-authorized/Ayudante');
} 


