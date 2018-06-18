<?php

require('conexion.php');

class Consultas extends ConexionDatabase{
    
    function listarUsuarios(){

        $connection = ConexionDatabase::connect();

        if($connection){
            $sqlQuery = "select IDUsuario, NombreUsuario, ApellidoPaternoUsuario,ApellidoMaternoUsuario,CorreoElectronicoUsuario, DescRolUsuario, DescPrt 
            from Usuarios inner join DataUsuario on IDUsuario = IDUsuarioDataUsuario
            inner join RolesUsuario on RolUsuario = IDRolUsuario
			inner join PasswordUsuario on IDUsuario = IDUsuarioPassword
			inner join PlantaRevisionTecnica on IDPrt = PlantaUsuario
            where RolesUsuario.IDRolUsuario != 1
            and EstadoUsuario != 2
			and EstadoPassword != 2;";

            $statement = sqlsrv_query($connection, $sqlQuery);

            if(!$statement){
                die( print_r( sqlsrv_errors(), true));
            }

            $rows = sqlsrv_has_rows($statement);
            
            if($rows){
                $usuarios[] = array();
                $countUsers = 0;
                while($usuario = sqlsrv_fetch_object($statement)){
                    $usuarios[$countUsers] = $usuario;
                    $countUsers++;
                }
                  
            }else{
               $usuarios = [];
            }
        }
        if (!empty($usuarios)){            
            return $usuarios;
            sqlsrv_close($connection);
        }else{
            return 0;
            sqlsrv_close($connection);
        }
       
       
    }

    function listarPlantas(){

        $connection = ConexionDatabase::connect();

        if($connection){
            $sqlQuery = "select DescPrt,IDRegion,DescRegion,IDProvincia,DescProvincia, IDComuna, DescComuna, DireccionPrt 
            from PlantaRevisionTecnica
            inner join Comuna on IDComuna = ComunaPrt
            inner join Provincia on IDProvincia = ProvinciaComuna
            inner join Region on IDRegion = RegionProvincia;";

            $statement = sqlsrv_query($connection, $sqlQuery);

            if(!$statement){
                die( print_r( sqlsrv_errors(), true));
            }

            $rows = sqlsrv_has_rows($statement);
            
            if($rows){
                $plantas[] = array();
                $countPlantas = 0;
                while($planta = sqlsrv_fetch_object($statement)){
                    $plantas[$countPlantas] = $planta;
                    $countPlantas++;
                }
                  
            }else{
               $plantas = [];
            }
        }
        if (!empty($plantas)){            
            return $plantas;
            sqlsrv_close($connection);
        }else{
            return 0;
            sqlsrv_close($connection);
        }
       
       
    }

    function getLastIDUsuario(){

        $connection = ConexionDatabase::connect();

        if($connection){

            $sqlQuery="select MAX(IDUsuario) from Usuarios;";

            $statement = sqlsrv_query($connection, $sqlQuery);

            if(!$statement){
                echo('Ocurrio el siguiente error: ');
                die( print_r( sqlsrv_errors(), true));
            }

            if( sqlsrv_fetch( $statement ) === false) {
                echo('Ocurrio el siguiente error: ');
                die( print_r( sqlsrv_errors(), true));
            }

            $id = sqlsrv_get_field( $statement, 0);
        }
        sqlsrv_close($connection);
        return $id;
    }

    function getIDUsuarioPorEmail($mail){

        $connection = ConexionDatabase::connect();

        if($connection){

            $sqlQuery="select IDUsuarioDataUsuario from DataUsuario where CorreoElectronicoUsuario='".$mail."';";

            $statement = sqlsrv_query($connection, $sqlQuery);

            if(!$statement){
                echo('Ocurrio el siguiente error: ');
                die( print_r( sqlsrv_errors(), true));
            }

            if( sqlsrv_fetch( $statement ) === false) {
                echo('Ocurrio el siguiente error: ');
                die( print_r( sqlsrv_errors(), true));
            }

            $id = sqlsrv_get_field( $statement, 0);
        }
        sqlsrv_close($connection);
        return $id;
    }

    function getRolesDeUsuario(){

        $connection = ConexionDatabase::connect();

        if($connection){
            
            $sqlQuery="select * from RolesUsuario where IDRolUsuario !=1;";

            $statement = sqlsrv_query($connection, $sqlQuery);
        }

        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }

        $rows = sqlsrv_has_rows($statement);
        
        if($rows){
            $roles[] = array();
            $countRoles = 0;
            while($rol = sqlsrv_fetch_object($statement)){
                $roles[$countRoles] = $rol;
                $countRoles++;
            }
              
        }else{
            echo('No hay data para mostrar.');
        }
        sqlsrv_close($connection);
        return $roles; 
    }

    function getPlantas(){

        $connection = ConexionDatabase::connect();

        if($connection){
            
            $sqlQuery="select * from PlantaRevisionTecnica;";

            $statement = sqlsrv_query($connection, $sqlQuery);
        }

        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }

        $rows = sqlsrv_has_rows($statement);
        
        if($rows){
            $plantas[] = array();
            $countPlantas = 0;
            while($planta = sqlsrv_fetch_object($statement)){
                $plantas[$countPlantas] = $planta;
                $countPlantas++;
            }
              
        }else{
            echo('No hay data para mostrar.');
        }
        sqlsrv_close($connection);
        return $plantas; 
    }

    function getComunas(){

        $connection = ConexionDatabase::connect();

        if($connection){
            
            $sqlQuery="select * from Comuna order by DescComuna;";

            $statement = sqlsrv_query($connection, $sqlQuery);
        }

        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }

        $rows = sqlsrv_has_rows($statement);
        
        if($rows){
            $comunas[] = array();
            $countComunas = 0;
            while($comuna = sqlsrv_fetch_object($statement)){
                $comunas[$countComunas] = $comuna;
                $countComunas++;
            }
              
        }else{
            echo('No hay data para mostrar.');
        }
        sqlsrv_close($connection);
        return $comunas; 
    }

    function getProvincias(){

        $connection = ConexionDatabase::connect();

        if($connection){
            
            $sqlQuery="select * from Provincia;";

            $statement = sqlsrv_query($connection, $sqlQuery);
        }

        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }

        $rows = sqlsrv_has_rows($statement);
        
        if($rows){
            $provincias[] = array();
            $countProvincias = 0;
            while($provincia = sqlsrv_fetch_object($statement)){
                $provincias[$countProvincias] = $provincia;
                $countProvincias++;
            }
              
        }else{
            echo('No hay data para mostrar.');
        }
        sqlsrv_close($connection);
        return $provincias; 
    }

    function getRegiones(){

        $connection = ConexionDatabase::connect();

        if($connection){
            
            $sqlQuery="select * from Region;";

            $statement = sqlsrv_query($connection, $sqlQuery);
        }

        if(!$statement){
            echo('Ocurrio el siguiente error: ');
            die( print_r( sqlsrv_errors(), true));
        }

        $rows = sqlsrv_has_rows($statement);
        
        if($rows){
            $regiones[] = array();
            $countRegiones = 0;
            while($region = sqlsrv_fetch_object($statement)){
                $regiones[$countRegiones] = $region;
                $countRegiones++;
            }
              
        }else{
            echo('No hay data para mostrar.');
        }
        sqlsrv_close($connection);
        return $regiones; 
    }

}

