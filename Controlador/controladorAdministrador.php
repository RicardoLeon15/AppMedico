<?php
require_once 'Vista/VistaAdministrador/agregarMedico.php';
require_once 'Vista/VistaAdministrador/listaMedicos.php';

    class controladorAdministrador{
        
        function __construct($url)
        {
            if(strcmp($url,"listaMedicos")==0){
                $lP=new listaMedicos();
            } 
            if(strcmp($url,"agregarMedico")==0){
                $aP=new agregarMedico();
            }       
        }
    }
?>