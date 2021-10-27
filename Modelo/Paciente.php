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

        public function __construct(){
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
         * @param string $IdPaciente
         */
        public function setIdPaciente($IdPaciente){
            $this->IdPaciente = $IdPaciente;
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
         * @return boolean 
         */
        public function actualizarPaciente(){
            if($this->Expediente->actualizarExpediente()){
                require_once("ConexionBD.php");
                $conexion = conexion();
                $idexpediente = $this->Expediente->getIdExpediente();
                $actualiza = mysqli_query($conexion,"UPDATE Paciente SET Nombre = '$this->Nombre', Paterno = '$this->Paterno', Materno = '$this->Materno', Edad = '$this->Edad', Genero = '$this->Genero', Fecha de nacimiento = '$this->FechaNacimiento', IdExpediente = '$idexpediente' WHERE IdPaciente = '$this->IdPaciente'");
                if($actualiza){
                    return true;
                }
            }
            return false;
        }

        /**
         * @return boolean
         */
        public function eliminarPaciente(){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $delete = mysqli_query($conexion,"DELETE FROM Paciente WHERE IdPaciente = '$this->IdPaciente'");
            if($delete){
                return true;
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
         * @return string
         */
        public function agregarPaciente(){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $sql = "INSERT INTO Paciente(Nombre, Paterno, Materno, Edad, Genero, FNacimiento, IdExpediente) VALUES ('".$this->Nombre."','".$this->Paterno."','".$this->Materno."','".$this->Edad."','".$this->Genero."','".$this->FechaNacimiento."','".$this->Expediente->getIdExpediente()."')";
            if($conexion->query($sql) === TRUE) {
                return "Paciente registrado exitosamente";
            } 
        } 
    }

    class ListaPaciente{
        /**
         * @var Paciente|array
         */
        private $Pacientes = array();
         
        /**
         * @param string $fecha
         */
        public function buscarFecha($fecha){
            reset($Pacientes);
            require_once("ConexionBD.php");
            $conexion = conexion();
            $registro = mysqli_query($conexion,"SELECT p.IdPaciente,p.Nombre, p.Paterno, p.Materno, p.Edad, p.Genero,
                                                p.`Fecha de Nacimiento`, e.IdExpediente, e.Padecimiento, e.Sintomas,
                                                e.Ingreso, e.Medicacion, e.IdDoctor FROM Paciente AS p INNER JOIN Expediente
                                                AS e ON p.IdExpediente = e.IdExpediente WHERE e.Ingreso LIKE '%$fecha%'");
            while($row=mysqli_fetch_assoc($registro)){
                $ex = new Expediente();
                $ex->setIdExpediente($row["IdExpediente"]);
                $ex->actualizarDatos($row["Padecimiento"],$row["Sintomas"],$row["Medicacion"],$row["Ingreso"],$row["IdDoctor"]);
                $pac = new Paciente();
                $pac->setIdPaciente($row["IdPaciente"]);
                $pac->actualizarDatos($row["Nombre"],$row["Paterno"],$row["Materno"],$row["Edad"],$row["Genero"],$row["Fecha de Nacimiento"],$ex);
                array_push($this->$Pacientes,$pac);
            }
        }

        /**
         * @param string $Nombre
         */
        public function buscarNombre($Nombre){
            reset($Pacientes);
            require_once("ConexionBD.php");
            $conexion = conexion();
            $registro = mysqli_query($conexion,"SELECT p.IdPaciente,p.Nombre, p.Paterno, p.Materno, p.Edad, p.Genero,
                                                p.`Fecha de Nacimiento`, e.IdExpediente, e.Padecimiento, e.Sintomas,
                                                e.Ingreso, e.Medicacion, e.IdDoctor FROM Paciente AS p INNER JOIN Expediente
                                                AS e ON p.IdExpediente = e.IdExpediente WHERE p.Nombre LIKE '%$Nombre%' OR p.Paterno LIKE '%$Nombre%' OR p.Materno LIKE '%$Nombre%'");
            while($row=mysqli_fetch_assoc($registro)){
                $ex = new Expediente();
                $ex->setIdExpediente($row["IdExpediente"]);
                $ex->actualizarDatos($row["Padecimiento"],$row["Sintomas"],$row["Medicacion"],$row["Ingreso"],$row["IdDoctor"]);
                $pac = new Paciente();
                $pac->setIdPaciente($row["IdPaciente"]);
                $pac->actualizarDatos($row["Nombre"],$row["Paterno"],$row["Materno"],$row["Edad"],$row["Genero"],$row["Fecha de Nacimiento"],$ex);
                array_push($this->$Pacientes,$pac);
            }
        }
    }
?>