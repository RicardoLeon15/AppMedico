<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/
    include '../plantilla/plantillaMedico.php';

    function section(){
?>

      <style>
        #contenedorTitulo{
          width: 80%;
          margin: 0 10% 0 10%;
          padding: 2px 20px 2px;
          border:1px solid white;
          border-radius: 10px;
          background-color: #fff;
          box-shadow: 1px 1px 1px black;
        }
        #buscadorNombre, #buscadorFecha{
           border-radius: 10px;
        }
      </style>

    <!--Agregamos la tabla con los registros de los pacientes-->
    <br><br>
    <div id="contenedorTitulo">
      <h5>Lista de pacientes</h5>
    </div>
    <br>
    <div class="contenedorTabla row">
      
      <br><br>

      <!--SECCION DE LOS BUSCADORES---------------------------------------------------->
      <div id="buscadorNombre" class="col s4"> 
            <input type="text" class="col s3 center-align" id="buscarNombre" placeholder="Ingrese nombre" onkeyup="Buscar()">
            <i class="Small material-icons col s1 left-align">search</i> 
      </div>
   
      <div id="buscadorFecha" class="col s3 right-align offset-s5">   
            <input type="date" class="col s3 center-align"id="buscarFecha" onclick="" placeholder="dd/mm/aa" class="mt-4 form-control">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
            </tr>
          </thead>
      
          <tbody>
            <tr>
              <td>11228284</td>
              <td>Genaro</td>
              <td>Ramírez</td>
              <td>M</td>
              <td>18/10/2021</td>
            </tr>
          </tbody>
        </table>
        <br><br>

    </div>
  
<?php
    }
?>            
