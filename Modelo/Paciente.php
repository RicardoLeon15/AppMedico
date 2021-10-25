<?php
    namespace Modelo;

    require_once 'Sujeto.php';
    require_once 'Expediente.php';

    class Paciente extends Sujeto{
        /**
         * @var string
         */
        protected $IdPaciente;
        
        /**
         * @var string
         */
        protected $Nombre;

        /**
         * @var string
         */
        protected $Paterno;

        /**
         * @var string
         */
        protected $Materno;

        /**
         * @var string
         */
        protected $Edad;

        /**
         * @var string
         */
        protected $Genero;

        /**
         * @var string
         */
        protected $FechaNacimiento;

        /**
         * @var Expediente
         */
        protected $Expediente;

        public function __construct()
        {
            $this->Expediente = new Expediente();
        }

        /**
         * @return string
         */
        public function getIdPaciente(){
            return $this->IdPaciente;
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
        public function getEdad(){
            return $this->Edad;
        }

        /**
         * @return string
         */
        public function getGenero(){
            return $this->Genero;
        }

        /**
         * @return string
         */
        public function getFechaNacimiento(){
            return $this->FechaNacimiento;
        }

        /**
         * @return Expediente
         */
        public function getExpediente(){
            return $this->Expediente;
        }

        /**
        *
        * @param string $IdPaciente
        * @return boolean
        */
        public function buscarPaciente($IdPaciente){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $registro = mysqli_query($conexion,"SELECT * FROM paciente WHERE IdPaciente='$IdPaciente'");
            if($resultado = mysqli_fetch_array($registro)){
                $datos[] = $resultado;
                if($this->Expediente->buscarExpediente($datos[0]["IdExpediente"])){
                    $this->IdPaciente = $datos[0]["IdPaciente"];
                    $this->Nombre = $datos[0]["Nombre"];
                    $this->Paterno = $datos[0]["Paterno"];
                    $this->Materno = $datos[0]["Materno"];
                    $this->Edad = $datos[0]["Edad"];
                    $this->Genero = $datos[0]["Genero"];
                    $this->FechaNacimiento = $datos[0]["Fecha de nacimiento"];
                    return true;
                }
            }
            return false;
        }
        
    }
?>