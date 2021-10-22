<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/

    require_once 'plantillaMedico.php';

    class listaPacientes extends Vista{

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
              <td>11228284</td>
              <td>Genaro</td>
              <td>Ramírez</td>
              <td>M</td>
              <td>18/10/2021</td>
              <td><a href="datosPaciente.php"><input type="button" value="Editar" id="btnEditar"></a></td>
              <td><input type="button" value="PDF" id="btnExpediente"></td>
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
    $lP=new listaPacientes();
?>            
