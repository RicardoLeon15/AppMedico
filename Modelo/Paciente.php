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

        /**
        *
        * @param string $IdPaciente
        */

        function __construct($Nombre,$Paterno,$Materno,$Edad,$Genero,$FeNa,$Expediente){
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

        public function buscarPaciente($IdPaciente){
            require("ConexionBD.php");
            $conexion = conexion();
        }
    }
?>