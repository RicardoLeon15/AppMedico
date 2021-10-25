<?php

    /**El siguiente controlador se usa para agregar al medico */
    include '../Modelo/ConexionBD.php';
    require_once '../Modelo/Medico.php';
    $modelo=new MedicoDB();

    $msg = NULL;
    $nombre= $_POST['nombre'];
    $aPaterno=$_POST['aPaterno'];
    $aMaterno=$_POST['aMaterno'];
    $contrasenia=$_POST['cContra'];

    $m=new Medico(0,$nombre,$aPaterno,$aMaterno,$contrasenia);
    echo $modelo->ingresarMedico($m);
    
?>