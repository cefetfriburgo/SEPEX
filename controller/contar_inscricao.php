<?php
    require_once dirname(__FILE__)."./../model/principal.php";
    
    class ControllerInscricao{
        private $inscricao;

        public function __construct(){            
            $this->inscricao = new Principal();
        }

        public function contar(){
             return $this->inscricao->contarInscricao();
            
        }

    }

    $ctrlInscricao = new ControllerInscricao();
    $qtdInscricao = $ctrlInscricao->contar();
?>