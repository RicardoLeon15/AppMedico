<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/

    require_once 'plantillaAdministrador.php';

    class listaMedicos extends Vista{

        public function __construct()
        {
          $this->encabezado();
          $this->menu();
          $this->contenido();
          $this->footer();
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
        <h5>Lista de medicos</h5>
      </div>    
      <br><br>
      
      <div class="row" id="conTablaLista">  
      <br><br>
        <!--SECCION DE LOS BUSCADORES---------------------------------------------------->
        <div class="col s12">

          <div id="buscadorNombre" class="col s4"> 
            <input type="text" class="col s3 center-align" id="buscarNombre" placeholder="Ingrese nombre" onkeyup="Buscar()">
            <i class="Small material-icons col s1 left-align">search</i> 
          </div>
            
          <br>
        </div>  
        <!-------------------------------------------------------------------------------->      
      <br><br><br>

      <!--SECCION DE LA TABLA DE PACIENTES---------------------------------------------->
      <table class="centered" id="tMedicos">
        <thead>
          <tr>
            <th>Clave</th>
              <th>Nombre</th>
              <th>Apellido paterno</th>
              <th>Apellido materno</th>
              <th>Eliminar</th>
            </tr>
          </thead>
        
          <tbody>
            <tr>
              <td>11228284</td>
              <td>Genaro</td>
              <td>Ramírez</td>
              <td>Santiago</td>
              <td><input type="button" value="Eliminar"></td>
            </tr>
          </tbody>
      </table>
      <!--------------------------------------------------------------------------------->
      <br><br>
    </div>
  </div>

    
<?php
        }
    }

    /**Cargamos el objeto ---Modificar posteriormente
     * para que el controlador lo cree
    */
    $lP=new listaMedicos();
?>            
