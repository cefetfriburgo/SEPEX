<?php
    require_once dirname(__FILE__)."./../model/atividade.php";

    
    class ControllerAtividade{
        private $atividade;
        
        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function nome($id){
            return $this->atividade->nomeAtividade($id);            
        }

    }

    $ctrlAtividade = new ControllerAtividade();
    
   
   
?>