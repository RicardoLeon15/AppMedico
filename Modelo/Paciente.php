<?php
    namespace Modelo;

    require_once 'Sujeto.php';
    require_once 'Expediente.php';

    class Paciente extends Sujeto{
        /**
         * @var string
         */
        protected $idPaciente;
        
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
    }
?>