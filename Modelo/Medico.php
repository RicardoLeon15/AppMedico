<?php

use function Modelo\conexion;
//require_once 'Modelo/ConexionBD.php';
    class Medico{

        /**
         * @var int
         */
        private  $IdMedico;
        /**
         * @var string
         */
        private $contra;
        /**
         * @var string
         */
        private $nombre;

        /**
         * @var string
         */
        private $paterno;

        /**
         * @var string
         */
        private $materno;

        function __construct($IdMedico,$nombre,$paterno,$materno,$contra){
            $this->IdMedico=$IdMedico;
            $this->nombre=$nombre;
            $this->paterno=$paterno;
            $this->materno=$materno;
            $this->contra=$contra;
        }

        function getId(){return $this->IdMedico;}
        function getNombre(){return $this->nombre;}
        function getPaterno(){return $this->paterno;}
        function getMaterno(){return $this->materno;}
        function getContra(){return $this->contra;}
    }

    class MedicoDB{
        public $conexion;
        function __construct()
        {
            $this->conexion=conexion();
        }

        public function mostrarMedicos(){
            $sql = "SELECT * FROM Doctor";
            $result = mysqli_query($this->conexion, $sql);
            $listaMedicos= array();
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) { 
                /**Creamos el objeto aux */
                $medicoAux=new Medico($row["IdDoctor"],$row["Nombre"],$row["Paterno"],$row["Materno"],"0"); 
                $listaMedicos[]=$medicoAux;
                
              } 
              /**Devolvemos la lista de pacientes*/
              return $listaMedicos;
            } else {
              echo "0 results";
            }
        }
        /**
         * @param Medico $elemento
         */
        public function ingresarMedico($elemento){
          $nom=$elemento->getNombre();
          $ap=$elemento->getPaterno();
          $am=$elemento->getMaterno();
          $con=$elemento->getContra();
          $sql = "INSERT INTO Doctor(Nombre, Paterno, Materno, Contrasenia) VALUES ('".$nom."','".$ap."','".$am."','".$con."')";
          if ($this->conexion->query($sql) === TRUE) {
            return "Medico registrado exitosamente";
          }      
        }

        public function eliminarMedico($clave){
          $sql = "DELETE FROM Doctor WHERE IdDoctor='".$clave."'";
          if ($this->conexion->query($sql) === TRUE) {
            return "Medico eliminado exitosamente";
          } 
        }
    }

?>