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

    <style>
        #mensajes{
            font-size: 14px;
            color:red;
            border: 1px solid white;
            border-radius: 5px;
            background-color: rgb(255, 128, 128, .3);
            padding: 15px 30px 15px 30px;
            display: none;
        }
        #registrarAP{
            height: 30px;
            color:white;
            background-color: #012e46;
            border-radius: 5px;
        }
        #registrarAP:hover{
            background-color: #02152b;
            text-decoration:underline ;
        }
    </style>
    <br><br>
    
    <div class="contenedorFormularioAP">
    <div class="contenedorFormAP row">
         <h5 class="center-align">Registrar paciente</h5>
        <hr>

        <form id="registroPacienteAP" method="POST">
            
            <div class="col s5 push-s7">
                     <label for="fRP">Fecha de registro:</label>
                     <input type="date" placeholder="dd/mm/aa" id="fRP" name="fRegistroP">
            </div>

            <p class="col s12"><strong>Datos generales</strong></p>
            <input type="text" id="nombreP" name="NombreP" placeholder="Ingrese nombre...">
            <input class="col s5" type="text" id="aPaternoP" name="ApellidoPaternoP" placeholder="Ingrese apellido paterno...">
            <input class="col s5 offset-s2" type="text" id="aMaternoP" name="ApellidoMaternoP" placeholder="Ingrese apellido materno...">
            
            
            <!--Ajuste de la edad y fechaNacimiento-->
                
            <div class="row">
                <div class="col s5 push-s7">
                     <label for="fNP">Fecha de nacimiento:</label>
                     <input type="date" id="fNP" name="fNacimientoP">
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
                    <input type="radio" id="masculino" name="genero" value="m" checked>
				    <label for="masculino">M</label>
                </div>
	
                <div class="col s1 offset-s2">
                    <input type="radio" id="femenino" name="genero" value="f">
				    <label for="femenino">F</label>
                </div>
            </div>
            <!----------------------------->

            <!---Sección del expediente medico-->
            <p class="col s12"><br><strong>Datos medicos</strong></p>

            <p class="col s12">Diagnostico</p>
            <textarea id="diagnostico" name="Diagnostico" style="height:50px;"></textarea> 

            <p class="col s12">Sintomas</p>
            <textarea id="sintomas" name="Sintomas" style="height:100px;"></textarea> 

            <p class="col s12">Receta</p>
            <textarea id="receta" name="Receta" style="height:100px;"></textarea> 
            <br><br>

            <div class="errores col s12" id="mensajes">Seccion de errores</div>
            <br>
            <!----------------------------------->

            <button type="button" value="Registrar" class="col s3 offset-s9" id="registrarAP" name="registrarPaciente" onclick="crear()">Registrar</button>

        </form>
    </div>
    </div>

    <script>
        /**Se crea la solicitu ajax */

        /**--------En esta función se genera el Ajax-------- */
        function crear() {
              /**Invoamos la función que se encarga de validar los datos */
            if(validarFormulario()){
                var datos=$( "#registroPacienteAP" ).serializeArray();
                datos.push({name:"funcion",value:"registrar"});
                 $.ajax({
                   url:"Controlador/controladorFuncionesM.php", 
                   type: "POST",
                   data: datos,
                   success: function(resultado){
                    //document.getElementById("registroPacienteAP").reset();
                    document.getElementById('mensajes').innerHTML =resultado;
                    document.getElementById('mensajes').style='display:block;background-color: rgb(0, 196, 0, .3);color:green;';

                    /**La siguiente función se encargar de ocultar el div */
                    setTimeout(function() {
                        $("#mensajes").fadeOut(1500);
                    },3000);
                   },complete: function(){}
                });
            }
        }

        /**---------Funcion para mostrar la fecha actual/registro--------------------- */
        window.onload = function(){
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth()+1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var anio = fecha.getFullYear(); //obteniendo año
            if(dia<10)
                dia='0'+dia; //agrega cero si el menor de 10
            if(mes<10)
                mes='0'+mes //agrega cero si el menor de 10
            document.getElementById('fRP').value=anio+"-"+mes+"-"+dia;
        }

        /**--------En esta función se valida la información del formulario-------- */
       function validarFormulario() {
            
            /**Expresion usada para validar las cadenas del formulario */
            var divMensajes = document.getElementById('mensajes');
            var nombre = document.getElementById('nombreP').value;
            var amaterno = document.getElementById('aPaternoP').value;
            var apaterno = document.getElementById('aMaternoP').value;
            var edad = document.getElementById('edad').value;
            var fechaN = document.getElementById('fNP').value;
            var genero=" ";
            genero = $('input[name="genero"]:checked').val();

            var diagnostico = document.getElementById('diagnostico').value;
            var sintomas = document.getElementById('sintomas').value;
            var receta = document.getElementById('receta').value;
            var valido = true;
            var mensaje = " ";
            divMensajes.innerHTML=" ";

            /**Verificamos que los datos sean validos */
            if(nombre.length==0||amaterno.length==0||apaterno.length==0||edad.length==0||fechaN.length==0){
                mensaje="<li>Es necesario ingresar los datos generales</li>";
                divMensajes.innerHTML = mensaje;
                divMensajes.style='display:block';
                valido=false;
            }
            if(diagnostico.length==0||sintomas.length==0||receta.length==0){
                mensaje+="<li>Es necesario ingresar los datos medicos</li>";
                divMensajes.innerHTML=mensaje;
                divMensajes.style='display:block';
                valido=false;
            }
            return valido;
            //divMensajes.style='display:none';
       }

    </script>
<?php
        }
    }

    /**Cargamos el objeto ---Modificar posteriormente
     * para que el controlador lo cree
    */
?>