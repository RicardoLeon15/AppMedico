<?php

    /**El siguiente controlador se usa para manejar las funciones del Administrador */
    include '../Modelo/ConexionBD.php';
    require_once '../Modelo/Medico.php';

    $funcion=$_POST['funcion'];

    if($funcion=='registrar'){
        registrar();
    }else{
        if($funcion=='eliminar'){
            eliminar();
        }
    }

    function registrar(){

        $nombre= $_POST['nombre'];
        $aPaterno=$_POST['aPaterno'];
        $aMaterno=$_POST['aMaterno'];
        $contrasenia=$_POST['cContra'];

        $m=new Medico();
        $m->actualizaDatos(0,$nombre,$aPaterno,$aMaterno,$contrasenia);
        echo $m->agregarMedico();
    }

    function eliminar(){
        $modelo=new Medico();
        $cla= $_POST['clave'];
        echo $modelo->eliminarMedico($cla);
    }
    
    
?>