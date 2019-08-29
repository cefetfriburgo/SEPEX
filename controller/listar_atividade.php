<?php
    require_once dirname(__FILE__)."./../model/atividade.php";



    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function listar(){
             return $this->atividade->listarAtividade();
            
        }

    }

    $ctrlAtividade = new ControllerAtividade();
    $lista = $ctrlAtividade->listar();
    
?>