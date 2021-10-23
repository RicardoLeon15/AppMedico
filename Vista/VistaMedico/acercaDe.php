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
?>
        <br><br>
    
    <div class="contenedorFormularioAP">
    <div class="contenedorFormAP row">
    <img src="../../Imagenes/logoAM2.png" class="center" alt="logo" height = 110 width = 230 >
         <h5 class="center-align">Acerca de appMedica</h5>

        <p class = "center"> 
            appMedica le permite a los doctores poder llevar<br>
            un registro en linea de sus pacientes tomando en<br>
            cuenta un registro de sus expedientes, tambien<br>
            se les permite buscarlos por medio de sus nombres <br>
            o por las fechas en las cuales fueron atendidos.<br><br>

        </p>

         <p class = "center"><b>Esta aplicación fue hecha por:</b><br><br>
         Gutierrez Leon Ricardo<br>
         Nuñez Grajales Erick<br>
         Ramirez Santiago Genaro<br><br>

         <b>Esta aplicacion fue hecha bajo <br>la supervisión del 
         profesor : </b><br><br>Abraham Sanchez Lopez</p>



 
    </div>
    </div>

<?php
        }
    }

    $ap=new datosPaciente();
?>