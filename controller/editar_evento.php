<?php
    require_once dirname(__FILE__)."./../model/evento.php";

    
    class ControllerEvento{
        private $evento;
        
        public function __construct(){            
            $this->evento = new Evento();
        }

        public function nome($id){
            return $this->evento->nomeEvento($id);            
        }

    }

    $ctrlEvento = new ControllerEvento();


   
?>