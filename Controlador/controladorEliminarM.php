<?php

    /**El siguiente controlador se usa para agregar al medico */
    include '../Modelo/ConexionBD.php';
    require_once '../Modelo/Medico.php';
    $modelo=new MedicoDB();
    $cla= $_POST['clave'];
   
    echo $modelo->eliminarMedico($cla);
    
?>