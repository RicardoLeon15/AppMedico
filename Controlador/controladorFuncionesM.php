<?php

    /**El siguiente controlador se usa para manejar las funciones del medico */
    include '../Modelo/ConexionBD.php';
    require_once '../Modelo/Expediente.php';   
    require_once '../Modelo/Paciente.php';   

    $funcion=$_POST['funcion'];

    if($funcion=='registrar'){
        registrar();
    }else{
        if($funcion=='eliminar'){
            eliminar();
        }
    }

    function registrar(){

        $nombre=$_POST['NombreP'];
        $apellidoP=$_POST['ApellidoPaternoP'];
        $apellidoM=$_POST['ApellidoMaternoP'];
        $feNa=$_POST['fNacimientoP'];
        $edad=$_POST['Edad'];
        $genero=$_POST['genero'];

        $diagnostico=$_POST['Diagnostico'];
        $sintomas=$_POST['Sintomas'];
        $receta=$_POST['Receta'];
        $feRe=$_POST['fRegistroP'];

        $exp=new Expediente($diagnostico,$sintomas,$receta,$feRe,1);
        if($exp->ingresarExpediente()==true) /**Obtenemos el id del expediente ingresado */
        {
            /**Creamos el nuevo paciente */
            $pa=new Paciente($nombre,$apellidoP,$apellidoM,$edad,$genero,$feNa,$exp);
            return $pa->agregarPaciente();
        }

    }
    

?>