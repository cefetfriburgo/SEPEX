<?php
    require('../model/publico.php');

    class ControllerEvento{
        private $evento;

        public function __construct(){
            $this->evento = new Publico();
        }

        public function evento(){
            return $this->evento->exibirEvento();
            // $p = $this->evento->exibirEvento();

            // foreach($p as $pb){
            //     echo $pb['nome']  . $pb['hora_fim'] . $pb['total'];
            // }
        }
    }

    // $c = new ControllerEvento();
    // $c->evento();
?>

