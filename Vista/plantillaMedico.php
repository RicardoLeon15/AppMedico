<?php

    /**Esta clase funge como la clase abstracta del sistema */
    abstract class Vista{
        public abstract function terminarControlador();
        public abstract function notificar();
        public abstract function suscribir();

        public function encabezado(){
?>
            
        <!DOCTYPE html>
        <html lang="es-en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <!-- Incluimos materialize -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">        
            <!-- Vinculamos los iconos-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="../css/listaPacientes.css">


            <style>
                .logo{
                    background-color: #012e46;
                    margin-left: 5%;}
                nav{
                    background-color: #012e46;
                    padding:0 5% 0 5%;
                }
                footer{
                    position: relative;
                    bottom: 0;
                    width: 100%;
                    color: white;
                }
            </style>

        </head>
        <body>

<?php
        }
        public function menu(){

?>
        <!--Generamos nuestra barra de menu-->
      <nav>
        <div class="nav-wrapper menu">
            <a href="#" class="brand-logo logo">Logo</a>
                <ul id="nav-mobile menu" class="right hide-on-med-and-down">
                    <li><a href="">Perfil</a></li>
                    <li><a href="">Lista pacientes</a></li>
                    <li><a href="">Acerca de</a></li>
                </ul>
        </div>
      </nav>
<?php
        }
        public function contenido(){}
        public function footer(){
?>
    <!--Generamos el footer--> 
        <br></br>
        <footer class="page-footer" style="background-color: #012e46">
              <div class="footer-copyright">
                <div class="container" style="text-align:center;">
                © 2021 appMedica, todos los derechos reservados
                </div>
            </div>
            </footer>
            

    </body>
    </html>
<?php
        }
    }
?>



      