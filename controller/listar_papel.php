<?php
    require_once dirname(__FILE__)."./../model/atividade.php";



    class ControllerPapel{
        private $papel;

        public function __construct(){            
            $this->papel = new Atividade();
        }

        public function listar(){
            return $this->papel->listarPapel();
        }

    }

    $ctrlPapel = new ControllerPapel();
    $lista = $ctrlPapel->listar();

   
    
?>