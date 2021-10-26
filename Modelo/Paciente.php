<?php

    require_once 'Expediente.php';
    use function Modelo\conexion;

    class Paciente{
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
        
        /**
         * @param string $Nombre
         * @param string $Paterno
         * @param string $Materno
         * @param string $Edad
         * @param string $Genero
         * @param string $FeNa
         * @param Expediente $Expediente
         */
        public function actualizarDatos($Nombre,$Paterno,$Materno,$Edad,$Genero,$FeNa,$Expediente){
            $this->Nombre=$Nombre;
            $this->Paterno=$Paterno;
            $this->Materno=$Materno;
            $this->Edad=$Edad;
            $this->Genero=$Genero;
            $this->FechaNacimiento=$FeNa;
            $this->Expediente=$Expediente;
        }
        
        /**
         * @param Paciente $objeto
         */
        public function agregarPaciente($objeto){
            $conexion=conexion();
            $nom=$objeto->Nombre;
            $ap=$objeto->Paterno;
            $am=$objeto->Materno;
            $edad=$objeto->Edad;
            $gen=$objeto->Genero;
            $fNa=$objeto->FechaNacimiento;
            $exp=$objeto->Expediente;

            $sql = "INSERT INTO Paciente(Nombre, Paterno, Materno, Edad, Genero, FNacimiento, IdExpediente) VALUES ('".$nom."','".$ap."','".$am."','".$edad."','".$gen."','".$fNa."','".$exp."')";
            if ($conexion->query($sql) === TRUE) {
                return "Paciente registrado exitosamente";
            } 
        }

        
        
    }
?>