<?php

require('consultas.php');

class InsertUsuario extends ConexionDatabase{

    function insertarNuevoUsuario(){

        $consulta = new Consultas;

        $ultimaID = $consulta->getLastIDUsuario();
        $ultimaID++;
        $hoy = time();
        $hoy = date('Y-m-d', $hoy); 
        $hora = date('H:i:s', $hoy);
        $defaultPass = '808d63ba47fcef6a7c52ec47cb63eb1b747a9d527a77385fc05c8a5ce8007586265d003b4130f6b0c8f3bb2ad89965a5da07289ba5d1e35321e160bea4f766f8';

        $connection = ConexionDatabase::connect();

        if($connection){
            $mail = strtoupper($_POST['uMail']);
            $nombre = strtoupper($_POST['uName']);
            $apePat = strtoupper($_POST['uApePat']);
            $apeMat = strtoupper($_POST['uApeMat']);

            if($mail !=null & $mail!='' & $nombre != null & $nombre !='' & $apePat !=null & $apePat!='' & $apeMat !=null & $apeMat!=''){
                $sqlQuery="Insert into Usuarios values(".$ultimaID.",'".$hoy.'T'.$hora."',1,".$_POST['uRol'].");
                Insert into DataUsuario values('".$mail."','".$nombre."','".$apePat."','".$apeMat."',".$ultimaID.",2);
                Insert into PasswordUsuario values('".$defaultPass."',".$ultimaID.",3);";
                $statement = sqlsrv_query($connection, $sqlQuery);
            }else{
                $_SESSION['failInsert']=1;
                header('Location: ../../app-authorized/Principal');
            }
            
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

$insert = new InsertUsuario;
$insert->insertarNuevoUsuario();