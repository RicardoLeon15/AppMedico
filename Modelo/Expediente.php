<?php
use function Modelo\conexion;

    class Expediente{
        /**
         * @var string
         */
        private $IdExpediente;
        /**
         * @var string
         */
        private $Padecimiento;
        /**
         * @var string
         */
        private $Sintomas;
        /**
         * @var string
         */
        private $Ingreso;
        /**
         * @var string
         */
        private $Medicacion;
        /**
         * @var string
         */
        private $IdDoctor;

        /**
         * @return string
         */
        public function getIdExpediente(){
            return $this->IdExpediente;
        }
        /**
         * @return string
         */
        public function getPadecimiento(){
            return $this->Padecimiento;
        }
        /**
         * @return string
         */
        public function getSintomas(){
            return $this->Sintomas;
        }
        /**
         * @return string
         */
        public function getIngreso(){
            return $this->Ingreso;
        }
        /**
         * @return string
         */
        public function getMedicacion(){
            return $this->Medicacion;
        }
        /**
         * @return string
         */
        public function getIdDoctor(){
            return $this->IdDoctor;
        }
        /**
         * @param string $IdExpediente
         */
        public function setIdExpediente($IdExpediente){
            $this->IdExpediente = $IdExpediente;
        }

        /**
         * @param string $Padecimiento
         * @param string $Sintomas
         * @param string $Medicacion
         * @param string $Ingreso
         * @param string $IdDoctor
         */
        public function actualizarDatos($Padecimiento,$Sintomas,$Medicacion,$Ingreso,$IdDoctor)
        {
            $this->Padecimiento=$Padecimiento;
            $this->Sintomas=$Sintomas;
            $this->Ingreso=$Ingreso;
            $this->Medicacion=$Medicacion;
            $this->IdDcotor=$IdDoctor;
        }

        /**
         * @return boolean 
        */
        public function ingresarExpediente(){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $iddoctor="1";
            $IdExpediente=" ";
            $sql = "INSERT INTO Expediente(Padecimiento, Sintomas, Ingreso, Medicacion, IdDoctor) VALUES ('$this->Padecimiento','$this->Sintomas','$this->Ingreso','$this->Medicacion',1)";
            if ($conexion->query($sql) === TRUE) {
                /**Obtenemos el Id del expediente para posteriormente unirlo al medico */
                $sqlM="SELECT MAX(IdExpediente) AS id FROM Expediente";
                $result = mysqli_query($conexion, $sqlM);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { 
                        /**Le asignamos el Id al expediente */
                        $this->IdExpediente=$row["id"];   
                        return true;                   
                    } 
                  } else {
                    return false;
                  }
            }
        }  

        /**
         * @param string $IdExpediente
         * @return boolean
         */
        public function buscarExpediente($IdExpediente){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $registro = mysqli_query($conexion,"SELECT * FROM Expediente WHERE IdExpediente = '$IdExpediente'");
            if($resultado = mysqli_fetch_array($registro)){
                $datos[] = $resultado;
                $this->IdExpediente = $datos[0]["IdExpediente"];
                $this->Padecimiento = $datos[0]["Padecimiento"];
                $this->Sintomas = $datos[0]["Sintomas"];
                $this->Ingreso = $datos[0]["Ingreso"];
                $this->Medicacion = $datos[0]["Medicacion"];
                $this->IdDcotor = $datos[0]["IdDoctor"];
                return true;
            }
            return false;
        }

        /**
         * @return boolean 
         */
        public function actualizarExpediente(){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $actualiza = mysqli_query($conexion,"UPDATE Expediente SET Padecimiento = '$this->Padecimiento', Sintomas = '$this->Sintomas', Ingreso = '$this->Ingreso', Medicacion = '$this->Medicacion', IdDoctor = '$this->IdDoctor' WHERE IdExpediente = '$this->IdExpediente'");
            if($actualiza){
                return true;
            }
            return false;
        }

        /**
         * @return boolean
         */
        public function eliminarExpediente(){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $actualiza = mysqli_query($conexion,"DELETE FROM Expediente WHERE IdExpediente = '$this->IdExpediente'");
            if($actualiza){
                return true;
            }
            return false;
        }
    }

?>