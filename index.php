<?php

     class AppMedica{
         function __construct(){
            $url=" ";
            $url=$_GET['url'];
            $url=trim($url,'/');
            $url=explode('/',$url);

            /**Controlamos la vista que se mostrara*/
            /**Verificamos la existencia del archivo*/

            if(strcmp($url[0],"listaMedicos")==0||strcmp($url[0],"agregarMedico")==0){
                $archivo='Controlador/controladorAdministrador.php';
                /**Verificamos la existencia del archivo*/
                if(file_exists($archivo)){
                    require_once $archivo;
                    /**Nos comunicamos con el controlador
                     * que nos mostrara la vista de la 
                     * lista
                    */
                    $controlador=new controladorAdministrador($url[0]);
                }
            }
            
            if(strcmp($url[0],"agregarPaciente")==0||strcmp($url[0],"listaPacientes")==0){
                $archivo='Controlador/controladorPaciente.php';
                /**Verificamos la existencia del archivo*/
                if(file_exists($archivo)){
                    require_once $archivo;
                    /**Nos comunicamos con el controlador
                     * que nos mostrara la vista de la 
                     * lista
                    */
                    $controlador=new controladorPaciente($url[0]);
                }
            }
         }
     }

     $crear=new AppMedica();

?>