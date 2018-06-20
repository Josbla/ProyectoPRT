<?php

require('../../../DataManager/Data/consultas.php');

class InsertPlanta extends ConexionDatabase{

    function insertarNuevaPrt(){

        $consulta = new Consultas;

        $ultimaID = $consulta->getLastIDPlanta();
        $ultimaID++;
        $fechaHora = $_POST['fecha'];

        $connection = ConexionDatabase::connect();

        if($connection){
            $nombre = strtoupper($_POST['uName']);
            $comuna = $_POST['pComuna'];
            $direccion = strtoupper($_POST['pDir']);
            $telefono = $_POST['pTel'];
            $fechaHora = $_POST['fecha'];
            if($nombre !=null & $nombre!='' & $comuna != null & $comuna !='' & $direccion !=null & $direccion!='' & $telefono !=null & $telefono!='' & $fechaHora !=null & $fechaHora !=''){
                
                $sqlQueryPlanta = "Insert into PlantaRevisionTecnica values(".$ultimaID.",'".$nombre."',".$comuna.",'".$direccion."',".$telefono.",'".$fechaHora."');";
                
                $statement = sqlsrv_query($connection, $sqlQueryPlanta);              
                
            }else{
                $_SESSION['failInsert']=1;
                header('Location: ../../../app-authorized/Principal/Plantas');
            }
            
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

$insert = new InsertPlanta;
$insert->insertarNuevaPrt();