<?php
    namespace Modelo;
    require_once 'Observer.class.php';

    abstract class Sujeto
    {
        /**
         * 
         * @var Observer|array
         */
        protected $observadores = array();
        
        /**
         *
         * @param Observer $observador            
         */
        public function agrega(Observer $observador)
        {
            $this->observadores[] = $observador;
        }

        /**
         *
         * @param Observer $observador            
         */
        public function suprime(Observer $observador)
        {
            $key = array_search($observador, $this->observadores);
            if ($key !== FALSE)
            {
                unset($this->observadores[$key]);
            }
        }

        public function notifica()
        {
            foreach ($this->observadores as $observador)
            {
                $observador->actualiza();
            }
        }
    }
?>