<?php
    require_once "./../model/evento.php";

    $nome = $_POST['titulo'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function listar(){
            $this->evento->listarEvento();
        }

    }

    $ctrlEvento = new ControllerEvento();

?>