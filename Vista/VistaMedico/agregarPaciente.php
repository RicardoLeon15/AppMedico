<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/
    require_once 'plantillaMedico.php';

    class agregarPaciente extends Vista{

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
         <h5 class="center-align">Registrar paciente</h5>
        <hr>

        <form id="registroPacienteAP">
            
            <div class="col s5 push-s7">
                     <label for="fRP">Fecha de registro:</label>
                     <input type="date" placeholder="dd/mm/aa" id="fRP" name="fRegistroP">
            </div>

            <p class="col s12">Datos generales</p>
            <input type="text" id="nombreP" name="NombreP" placeholder="Ingrese nombre...">
            <input class="col s5" type="text" id="aPaternoP" name="ApellidoPaternoP" placeholder="Ingrese apellido paterno...">
            <input class="col s5 offset-s2" type="text" id="aMaternoM" name="ApellidoMaternoP" placeholder="Ingrese apellido materno...">
            
            
            <!--Ajuste de la edad y fechaNacimiento-->
                
            <div class="row">
                <div class="col s5 push-s7">
                     <label for="fNP">Fecha de nacimiento:</label>
                     <input type="date" placeholder="dd/mm/aa" id="fNP" name="fNacimientoP">
                </div>
                <div class="col s4 pull-s5">
                <label for="edad">Edad:</label>
                    <input type="number" min=0 max=100 id="edad" name="Edad">      
                </div>
           </div>

            <!---Sección del genero--->
            <div class="col s12 m6">
                <div class="col s3">
				    <label for="hombre">Genéro</label>
                </div>
                <div class="col s1">
                    <input type="radio" id="masculino" name="genero" value="m">
				    <label for="masculino">M</label>
                </div>
	
                <div class="col s1 offset-s2">
                    <input type="radio" id="femenino" name="genero" value="f">
				    <label for="femenino">F</label>
                </div>
            </div>
            <!----------------------------->

            <!---Sección del expediente medico-->
            <p class="col s12">Diagnostico</p>
            <textarea id="diagnostico" name="Diagnostico" style="height:50px;">
            </textarea> 

            <p class="col s12">Sintomas</p>
            <textarea id="sintomas" name="Sintomas" style="height:100px;">
            </textarea> 

            <p class="col s12">Receta</p>
            <textarea id="receta" name="Receta" style="height:100px;">
            </textarea> 
            <br><br>
            <!----------------------------------->

            <input type="submit" value="Cancelar" class="col s3 offset-s5" id="cancelarAP" name="cancelarPaciente">
            <input type="submit" value="Registrar" class="col s3 offset-s1" id="registrarAP" name="registrarPaciente">
        </form>
    </div>
    </div>

    
<?php
        }
    }

    /**Cargamos el objeto ---Modificar posteriormente
     * para que el controlador lo cree
    */
    $ap=new agregarPaciente();
?>