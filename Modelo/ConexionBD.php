<?php
    namespace Modelo;

    use mysqli;

    global $enlace;
    function conexion(){
        $enlace=mysqli_connect('localhost','root','','appMedico');
        if(!$enlace){
            echo "Error no se puede conectar a MYSQL.".PHP_EOL;
            echo "Error de depuración: ".mysqli_connect_errno().PHP_EOL;
            echo "Error de depuracion: ".mysqli_connect_error().PHP_EOL;
            exit;
        }
        return $enlace;

        /*
        //Se establece la conexión con la BD 
        $server = "localhost:3307";//127.0.0.1
        $user = "root";
        $pass = "";

        //Creamos la nueva conexión mysql
        $conn = new mysqli($server, $user , $pass, 'appmedico');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            return $conn;
        }*/
    }

?>