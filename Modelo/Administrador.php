<?php
    use Modelo\Sujeto;

    use function Modelo\conexion;

    class Administrador extends Sujeto{
        /**
         * @var int
         */
        private  $IdAdministrador;

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
        public function getIdAdministrador(){
            return $this->IdAdministrador;
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
         * @param string $IdAdministrador
         * @param string $Nombre
         * @param string $Paterno
         * @param string $Materno
         * @param string $Contrasenia
         */
        public function actualizaDatos($IdAdministrador,$Nombre,$Paterno,$Materno,$Contrasenia){
            $this->IdAdministrador=$IdAdministrador;
            $this->Nombre=$Nombre;
            $this->Paterno=$Paterno;
            $this->Materno=$Materno;
            $this->Contrasenia=$Contrasenia;
        }

        /**
         * @param string $IdAdministrador
         * @param string $Contrasenia
         * @return boolean
         */
        public function iniciarSesion($IdAdministrador,$Contrasenia){
            require_once("ConexionBD.php");
            $conexion = conexion();
            $registro = mysqli_query($conexion,"SELECT * FROM Doctor WHERE IdDoctor = '$IdAdministrador' AND Contrasenia='$Contrasenia'");
            if($row = mysqli_fetch_assoc($registro)){
                $this->actualizaDatos($row["IdAdministrador"],$row["Nombre"],$row["Paterno"],$row["Materno"],$row["Contrasenia"]);
                return true;
            }
            return false;
        }
    }
?>