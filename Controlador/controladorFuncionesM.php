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
        $modelo=new ExpedienteDB();

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
        $idExp=$modelo->ingresarExpediente($exp); /**Obtenemos el id del expediente ingresado */
        
        $pa=new Paciente($nombre,$apellidoP,$apellidoM,$edad,$genero,$feNa,$idExp);
        $aux=$pa;
        echo $aux->agregarPaciente($pa);
        
        
    }
    

?>