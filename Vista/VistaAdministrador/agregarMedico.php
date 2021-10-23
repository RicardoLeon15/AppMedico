<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/

    require_once 'plantillaAdministrador.php';

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


    </style>

    <br><br>
    
    <div class="contenedorFormularioM">
    <div class="contenedorFormM row">
         <h5 class="center-align">Registrar medico</h5>
        <hr>

        <form id="registroMedico">
                 
            <input type="text" id="nombre" name="Nombre" placeholder="Ingrese nombre...">
            <input class="col s5" type="text" id="aPaterno" name="ApellidoPaterno" placeholder="Ingrese apellido paterno...">
            <input class="col s5 offset-s2" type="text" id="aMaterno" name="ApellidoMaterno" placeholder="Ingrese apellido materno...">
            <input class="col s5" type="password" id="contraseña" name="Contraseña" placeholder="Ingrese contraseña...">
            <input class="col s5 offset-s2" type="password" id="cContraseña" name="confirmarContraseña" placeholder="Confirmar contraseña...">

            <input type="submit" value="Cancelar" class="col s3 offset-s5">
            <input type="submit" value="Registrar" class="col s3 offset-s1" id="registrarP" name="registrarPaciente">
        </form>
    </div>
    </div>


    
<?php
        }
    }

    /**Cargamos el objeto ---Modificar posteriormente
     * para que el controlador lo cree
    */
?>            
