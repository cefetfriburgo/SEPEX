<?php
    require_once dirname(__FILE__)."./../model/principal.php";

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Principal();
        }

        public function contar(){
             return $this->evento->contarEvento();
            
        }

    }

    $ctrlEvento = new ControllerEvento();
    $qtdEvento = $ctrlEvento->contar();
?>