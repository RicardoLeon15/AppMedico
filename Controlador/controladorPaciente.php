<?php
require_once 'Vista/VistaMedico/agregarPaciente.php';
require_once 'Vista/VistaMedico/listaPacientes.php';
require_once 'Vista/VistaMedico/acercaDeM.php';

    class controladorPaciente{
        
        function __construct($url)
        {
            if(strcmp($url,"listaPacientes")==0){
                $lP=new listaPacientes();
            } 
            if(strcmp($url,"agregarPaciente")==0){
                $aP=new agregarPaciente();
            } 
            if(strcmp($url,"acercaDeM")==0){
                $aP=new AcercaDeM();
            }           
        }
    }
?>