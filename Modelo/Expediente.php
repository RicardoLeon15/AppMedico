<?php
    namespace Modelo;

    class Expediente{
        /**
         * @var string
         */
        protected $IdExpediente;

        /**
         * @var string
         */
        protected $Padecimiento;

        /**
         * @var string
         */
        protected $Sintomas;

        /**
         * @var string
         */
        protected $Ingreso;

        /**
         * @var string
         */
        protected $Medicacion;

        /**
         * @var string
         */
        protected $IdDcotor;

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
            return $this->IdDcotor;
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
    }

?>