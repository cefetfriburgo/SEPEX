<?php
    require('../model/publico.php');

    class ControllerConsultarAtividade{
        private $consultarAtividade;

        public function __construct(){
            $this->consultarAtividade = new Publico();
        }

        public function consultarAtividade($email){
             return $this->consultarAtividade->consultarAtividade($email);
          
        }

    }

   
   
    
?>

