<?php

    use Modelo\Sujeto;
    use function Modelo\conexion;
    //require_once 'Modelo/ConexionBD.php';
    require_once 'Sujeto.php';
    class Medico extends Sujeto{

        /**
         * @var int
         */
        private  $IdMedico;
        /**
         * @var string
         */
        private $Nombre;
        /**
         * @var string
         */
        private $Paterno;

        /**
         * @var string
         */
        private $Materno;

        /**
         * @var string
         */
        private $Contrasenia;

        public function __construct(){
        }

        /**
         * @return string
         */
        public function getId(){
          return $this->IdMedico;
        }

        /**
         * @return string
         */
        public function getNombre(){
          return $this->Nombre;
        }

        /**
         * @return string
         */
        public function getPaterno(){
          return $this->Paterno;
        }

        /**
         * @return string
         */
        public function getMaterno(){
          return $this->Materno;
        }

        /**
         * @return string
         */
        public function getContrasenia(){
          return $this->Contrasenia;
        }

        /**
         * @param string $IdMedico
         * @param string $Nombre
         * @param string $Paterno
         * @param string $Materno
         * @param string $Contrasenia
         */
        public function actualizaDatos($IdMedico,$Nombre,$Paterno,$Materno,$Contrasenia){
          $this->IdMedico=$IdMedico;
          $this->Nombre=$Nombre;
          $this->Paterno=$Paterno;
          $this->Materno=$Materno;
          $this->Contrasenia=$Contrasenia;
      }

      /**
       * @return boolean
       */
      public function agregarMedico(){
        require_once("ConexionBD.php");
        $conexion = conexion();
        $add = mysqli_query($conexion,"INSERT INTO Doctor(Nombre,Paterno,Materno,Contrasenia) VALUE('$this->Nombre','$this->Paterno','$this->Materno','$this->Comtrasenia')");
        if($add){
          return true;
        }
        return false;
      }

      /**
       * @return boolean
       */
      public function eliminarMedico(){
        require_once("ConexionBD.php");
        $conexion = conexion();
        $delete = mysqli_query($conexion,"DELETE FROM Doctor WHERE IdDoctor = '$this->IdMedico'");
        if($delete){
          return true;
        }
        return false;
      }

      /**
       * @param string $IdMedico
       * @param string $Contrasenia
       * @return boolean
       */
      public function iniciarSesion($IdMedico,$Contrasenia){
        require_once("ConexionBD.php");
        $conexion = conexion();
        $registro = mysqli_query($conexion,"SELECT * FROM Doctor WHERE IdDoctor = '$IdMedico' AND Contrasenia='$Contrasenia'");
        if($row = mysqli_fetch_assoc($registro)){
          $this->actualizaDatos($row["IdDoctor"],$row["Nombre"],$row["Paterno"],$row["Materno"],$row["Contrasenia"]);
          return true;
        }
        return false;
      }
    }

    class ListaMedico{
      /**
       * @var Medico|array
       */
      private $Medicos = array();

      /**
       * @return Medico|array
       */
      public function getMedicos(){
        return $this->Medicos;
      }

      public function allMedicos(){
        reset($this->Medicos);
        require_once("ConexionBD.php");
        $conexion = conexion();
        $registro = mysqli_query($conexion,"SELECT * FROM Doctor");
        while($row = mysqli_fetch_assoc($registro)){
          $med = new Medico();
          $med->actualizaDatos($row["IdDoctor"],$row["Nombre"],$row["Paterno"],$row["Materno"],$row["Contrasenia"]);
          array_push($this->Medicos,$med);
        }
      }

      /**
       * @param string $Nombre
       */
      public function buscarNombre($Nombre){
        reset($this->Medicos);
        require_once("ConexionBD.php");
        $conexion = conexion();
        $registro = mysqli_query($conexion,"SELECT * FROM Doctor WHERE Nombre LIKE '%$Nombre%' OR Paterno LIKE '%$Nombre%' OR Materno LIKE '%$Nombre%'");
        while($row = mysqli_fetch_assoc($registro)){
          $med = new Medico();
          $med->actualizaDatos($row["IdDoctor"],$row["Nombre"],$row["Paterno"],$row["Materno"],$row["Contrasenia"]);
          array_push($this->Medicos,$med);
        }
      }
    }
?>