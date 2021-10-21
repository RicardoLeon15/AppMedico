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
                header{
                    background: #012e46;
                    width: 100%;
                    height: 60px;
                    position: fixed;
                }
                .corpyright{
                    position: relative;
                    bottom: 0;
                    width: 85%;
                    margin-left: 15%;
                    color: black;
                    border-top: 1px solid gray;
                }

                ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    width: 15%;
                    position: fixed;
                    height: 100%;
                    overflow: auto;
                    background-color: #02152b;
                    text-align: center;

                }

                li a {
                    display: block;
                    margin: 5px 5px 5px 5px;
                    padding: 8px 16px;
                    text-decoration: none;
                    color: white;
                    background-color: #012e46;

                }

                /* Change the link color on hover */
                li a:hover {
                    background-color: #012e46;
                }
                .menuContenedor{
                    position: absolute;
                    top:60px;
                }
            </style>

        </head>
        <body>

<?php
        }
        public function menu(){

?>
        <!--Generamos nuestra barra de menu-->
      
        <header class="row">
            <!--En esta sección va el logo-->
            <div class="logo col s3">
            </div>
        </header>
        <br><br>
        <div class="menuContenedor">
            <ul> <br>
                <li>
                    <div class="user-view">
                        <div class="circle">
                            <img src="../Imagenes/medico.png" alt="Perfil">
                        </div>
                    </div>
                </li>
                <label style="color:white;  font-size: 14px;">Usuario</label>
                <li><a href="#news">Agregar paciente</a></li>
                <li><a href="#contact">Lista paciente</a></li>
                <li><a href="#about">Acerca de</a></li>
            </ul>
          </div>
<?php
        }
        public function contenido(){}
        public function footer(){
?>
    <!--Generamos el footer--> 
        <br></br>
        <footer>
              <div class="corpyright">
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



      
