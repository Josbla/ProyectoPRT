<?php

class ConexionDatabase{

    function connect(){
        //$serverName = "WIN-3HTPHCKDQ7B\MSSQLSERVER2014"; server 
        $serverName="DESKTOP-31RNGEQ";//local
        $connectionInfo = array("Database" => "PRT.System", "UID" => "prtadmin", "PWD" => "qwerty");

        $conn = sqlsrv_connect($serverName, $connectionInfo);
    
        if(!$conn){
            echo("No se pudo establecer la conexión.<br> ");
            die(print_r(sqlsrv_errors(), true));
        }
        return $conn;
    }
}
    
