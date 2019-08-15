<?php
    require_once dirname(__FILE__)."./../model/evento.php";



    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function listar(){
            return $this->evento->listarEvento();
        }

    }

    $ctrlEvento = new ControllerEvento();
    $lista = $ctrlEvento->listar();

    /*foreach($lista as $l){
        echo $l['nome'] . ' ' . $l['ano'] . ' ' . $l['semestre'] . "<br>";
    }*/
    
?>