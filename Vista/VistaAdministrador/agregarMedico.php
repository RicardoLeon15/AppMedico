<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/
    require_once 'plantillaAdministrador.php';
    require_once 'Controlador/controladorAdministrador.php';
    class agregarMedico extends Vista{

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
    <style>
        
        #registroMedico{
            width: 80%;
            margin-left:10%;
            margin-right: auto;
        }

        #registroMedico input{
            text-align: center;
            height: 35px;
        }
        #registroMedico label{
            color: black;
            font-size: 14px;
            height: 35;
            align-content: center;
            padding-top: 50%;
        }
        .contenedorFormularioM{
            width: 85%;
            margin-left:15%;
        }
        .contenedorFormM{
            width: 60%;
            margin: 0 20% 0 20%;
            padding: 15px;
            border:1px solid white;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 1px 1px 1px black;
        }
        #mensajes{
            font-size: 14px;
            color:red;
            border: 1px solid white;
            border-radius: 5px;
            background-color: rgb(255, 128, 128, .3);
            padding: 15px 30px 15px 30px;
            display:none;
        }
        #registrarM,#eliminarM{
            height: 30px;
            color:white;
            background-color: #012e46;
            border-radius: 5px;
        }
        #registrarM:hover{
            background-color: #02152b;
            text-decoration:underline ;
        }
        #eliminarM:hover{
            background-color: #02152b;
            text-decoration:underline ;
        }
    </style>

    <br><br>
    
    <div class="contenedorFormularioM">
    <div class="contenedorFormM row">
         <h5 class="center-align">Registrar medico</h5>
        <hr>

        <form id="registroMedico" method="POST">
            

            <div class="errores col s12" id="mensajes"></div>

            <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre...">

            <input class="col s5" type="text" id="aPaterno" name="aPaterno" placeholder="Ingrese apellido paterno...">
            <input class="col s5 offset-s2" type="text" id="aMaterno" name="aMaterno" placeholder="Ingrese apellido materno...">
            

            <input class="col s5" type="password" id="contra" name="contra" placeholder="Ingrese contraseña...">
            <input class="col s5 offset-s2" type="password" id="cContra" name="cContra" placeholder="Confirmar contraseña...">

            <button type="button" value="Registrar" class="col s3 offset-s9" id="registrarM" name="registrarMedico" onclick="crear()">Registrar</button>

        </form>
    </div>
    </div>
    
    <script>

      /**--------En esta función se genera el Ajax-------- */
      function crear() {
            /**Invoamos la función que se encarga de validar los datos */
            if(validarFormulario()){
                var datos=$( "#registroMedico" ).serializeArray();
                datos.push({name:"funcion",value:"registrar"});
                 $.ajax({
                   url:"Controlador/controladorFuncionesM.php", 
                   type: "POST",
                   data: datos,
                   success: function(result){
                     document.getElementById("registroMedico").reset();
                     document.getElementById('mensajes').innerHTML = result;
                     document.getElementById('mensajes').style='display:block;background-color: rgb(0, 196, 0, .3);color:green;';

                     /**La siguiente función se encargar de ocultar el div */
                     setTimeout(function() {
		                 // Declaramos la capa mediante una clase para ocultarlo
                         $("#mensajes").fadeOut(1500);
                     },3000);
                   },complete: function(){}
                });
            }
       }

       /**--------En esta función se valida la información del formulario-------- */
       function validarFormulario() {
            
            /**Expresion usada para validar las cadenas del formulario */
            const exp = new RegExp(/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g);

            var divMensajes = document.getElementById('mensajes');
            var nombre = document.getElementById('nombre').value;
            var apaterno = document.getElementById('aPaterno').value;
            var amaterno = document.getElementById('aMaterno').value;
            var contra = document.getElementById('contra').value;
            var cContra = document.getElementById('cContra').value;
            var mensaje = " ";
            divMensajes.innerHTML=" ";

            /**Verificamos que los datos sean validos */
            if(nombre.length == 0||apaterno.length == 0||amaterno.length == 0||contra.length == 0||cContra.length == 0){
                mensaje="<li>Se han detectado campos vacios</li>";
                divMensajes.innerHTML = mensaje;
                divMensajes.style='display:block';
                return false;
            }else{
                if(contra!=cContra){
                    mensaje="<li>Las contraseñas no coinciden.</li>";
                    divMensajes.innerHTML = mensaje;
                    divMensajes.style='display:block';
                    return false;
                }
                return  true;
            }
            divMensajes.style='display:none';
       }

  </script>

    
<?php
        }
    }
?>            
