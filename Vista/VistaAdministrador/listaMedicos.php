<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/

include 'Modelo/ConexionBD.php';
require_once 'plantillaAdministrador.php';
require_once 'Modelo/Medico.php';
    class listaMedicos extends Vista{
        
        public $modelo;
        public $lMedicos;

        public function __construct()
        {
          $this->modelo=new MedicoDB();
          $this->lMedicos=$this->modelo->mostrarMedicos();
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
    <style>
      #eliminarM{
            height: 30px;
            color:white;
            background-color: #012e46;
            border-radius: 5px;
        }
        #eliminarM:hover{
            background-color: #02152b;
            text-decoration:underline ;
        }
    </style>
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
            <?php
              /**En este segemento de codigo se cargan los datos del medico*/
              foreach ($this->lMedicos as $valor) {
                echo "<tr>";
                  echo "<td>".$valor->getId()."</td>";
                  echo "<td>".$valor->getNombre()."</td>";
                  echo "<td>".$valor->getPaterno()."</td>";
                  echo "<td>".$valor->getMaterno()."</td>";
                  echo "<td> <button type='button' value='Eliminar' id='eliminarM' name='eliminarMedico'>Eliminar</button></td>";
                echo "</tr>";
              }
            ?>
          </tbody>
      </table>
      <!--------------------------------------------------------------------------------->
      <br><br>
    </div>
  </div>

  <!---------------Funcion para fitrar datos en la tabla---------------------->
  <script>

    function Buscar(){
        const registros = document.getElementById('tMedicos'); //Almacenamos los registros/tabla
        const buscarR = document.getElementById('buscarNombre').value.toUpperCase();//Obtenemos la cadena a buscar
        let total = 0;

        // Recorremos todas las filas
        for (let i = 1; i < registros.rows.length; i++) {
            let encontrar = false;
            //Almacenamos las celdas de cada columna
            const celdasC = registros.rows[i].getElementsByTagName('td');
            // Recorremos todas las celdas
            for (let j = 0; j < celdasC.length && !encontrar; j++) {
                const compareWith = celdasC[j].innerHTML.toUpperCase();
                // Buscamos el texto en el contenido de la celda
                if (buscarR.length == 0 || compareWith.indexOf(buscarR) > -1) {
                    encontrar = true;
                    total++;
                }
            }
            if (encontrar) {
                /*Mostramos las coincidencias*/
                registros.rows[i].style.display = '';
            } else {
                /*Ocultamos los registros*/
                registros.rows[i].style.display = 'none';
            }
        }
    }

    $(document).on('click', '#eliminarM', function (event) {
      event.preventDefault();
      //= $(this).find("td:first-child").text();
      var reg=$(this).closest('tr');
      var cla = reg.find("td:first-child").text();

      var opcion=confirm("¿Desea eliminar el registro?")
      if (opcion==true) 
      {
        $.ajax({
          url:"Controlador/controladorEliminarM.php", 
          type: "POST",
          data:{
             clave:cla,
          },
          success: function(result){
            reg.remove();
            alert("Registro eliminado exitosamente");
           },complete: function(){}
        });
      }
    });

  </script>



    
<?php
        }
    }

    /**Cargamos el objeto ---Modificar posteriormente
     * para que el controlador lo cree
    */
?>            
