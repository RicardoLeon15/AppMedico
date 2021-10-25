<?php
use function Modelo\conexion;

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

        function __construct($Padecimiento,$Sintomas,$Medicacion,$Ingreso,$IdDoctor)
        {
            $this->Padecimiento=$Padecimiento;
            $this->Sintomas=$Sintomas;
            $this->Ingreso=$Ingreso;
            $this->Medicacion=$Medicacion;
            $this->IdDcotor=$IdDoctor;
        }

        function getPadecimiento(){return $this->Padecimiento;}
        function getSintomas(){return $this->Sintomas;}
        function getIngreso(){return $this->Ingreso;}
        function getMedicacion(){return $this->Medicacion;}
        function getIdDoctor(){return $this->IdDcotor;}

    }

    class ExpedienteDB{
        public $conexion;
        function __construct()
        {
            $this->conexion=conexion();
        }

        public function ingresarExpediente($elemento){
            $padecimiento=$elemento->getPadecimiento();
            $sintomas=$elemento->getSintomas();
            $ingreso=$elemento->getIngreso();
            $medicacion=$elemento->getMedicacion();
            $iddoctor="1";
            $IdExpediente=" ";
            $sql = "INSERT INTO Expediente(Padecimiento, Sintomas, Ingreso, Medicacion, IdDoctor) VALUES ('".$padecimiento."','".$sintomas."','".$ingreso."','".$medicacion."','".$iddoctor."')";
            if ($this->conexion->query($sql) === TRUE) {
                $sqlM="SELECT MAX(IdExpediente) AS id FROM Expediente";
                $result = mysqli_query($this->conexion, $sqlM);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { 
                      /**Creamos el objeto aux */
                      return $row["id"];                      
                    } 
                  } else {
                    echo "0 results";
                  }
            }   
        }
    }

?>