<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/
    include 'Modelo/ConexionBD.php';
    require_once 'plantillaMedico.php';
    require_once 'Modelo/Paciente.php';

    class listaPacientes extends Vista{

        public $modelo;
        public $lpac;

        public function __construct()
        {
          $this->encabezado();
          $this->menu();
          $this->contenido();
          $this->footer();
          $this->modelo = new ListaPaciente();
          $this->modelo->allPacientes();
          $this->lpac = $this->modelo->getPacientes();
        }
        public  function terminarControlador(){}
        public  function notificar(){}
        public  function suscribir(){}
    
        public function contenido(){
?>
    
    <!--Agregamos la tabla con los registros de los pacientes-->
    <br><br>
    <div class="contenedorLista">
    
      <div id="contTituloLista">
        <h5>Lista de pacientes</h5>
      </div>    
      
      <br><br>
      <div class="row" id="conTablaLista">  
      <br><br>
      <!--SECCION DE LOS BUSCADORES---------------------------------------------------->
      <div id="buscadorNombre" class="col s4"> 
        <input type="text" class="col s3 center-align" id="buscarNombre" placeholder="Ingrese nombre" onkeyup="Buscar()">
        <i class="Small material-icons col s1 left-align">search</i> 
      </div>
        
      <div id="buscadorFecha" class="col s3 right-align offset-s5">   
        <input type="date" class="col s3 center-align"id="buscarFecha" onclick="" placeholder="dd/mm/aa" class="mt-4 form-control">
      </div>
      <br><br><br>

      <!--SECCION DE LA TABLA DE PACIENTES---------------------------------------------->
      <table class="centered" id="tPacientes">
        <thead>
          <tr>
            <th>Clave</th>
              <th>Nombre</th>
              <th>Apellido paterno</th>
              <th>Genero</th>
              <th>Fecha registros</th>
              <th colspan="2">Acciones</th>
            </tr>
          </thead>
        
          <tbody>
            <tr>
            <?php
              /**En este segemento de codigo se cargan los datos del medico*/
              
              foreach ($this->lpac as $valor) {
                echo "<tr>";
                  echo "<td>".$valor->getId()."</td>";
                  echo "<td>".$valor->getNombre()."</td>";
                  echo "<td>".$valor->getPaterno()."</td>";
                  echo "<td>".$valor->getGenero()."</td>";
                  echo "<td>".$valor->getFechaNacimiento()."</td>";
                  echo "<td><a href=\"datosPaciente.php\"><input type=\"button\" value=\"Editar\" id=\"btnEditar\"></a></td>
                        <td><input type=\"button\" value=\"PDF\" id=\"btnExpediente\"></td>";
                echo "</tr>";
              }
            ?>
              
            </tr>
          </tbody>
      </table>
      <br><br>
    </div>
  </div>

    
<?php
        }
    }

    /**Cargamos el objeto ---Modificar posteriormente
     * para que el controlador lo cree
    */
?>            
