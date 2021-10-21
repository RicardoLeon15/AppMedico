<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/

use agregarPaciente as GlobalAgregarPaciente;

require_once 'plantillaMedico.php';

    class datosPaciente extends Vista{

        public function __construct()
        {
          $this->encabezado();
          $this->menu();
          $this->contenido();
          $this->footer();
        }
        public function terminarControlador(){}
        public function notificar(){}
        public function suscribir(){}

        public function contenido(){
        }
    }

    $ap=new datosPaciente();
?>