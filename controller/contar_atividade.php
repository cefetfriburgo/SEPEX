<?php
    require_once dirname(__FILE__)."./../model/principal.php";

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Principal();
        }

        public function contar(){
             return $this->atividade->contarAtividade();
            
        }

    }

    $ctrlAtividade = new ControllerAtividade();
    $qtdAtividade = $ctrlAtividade->contar();
?>