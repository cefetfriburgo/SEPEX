<?php
require dirname(__FILE__).'./../model/publico.php';

    class ControllerRelatorio{
        private $relatorio;
        public function __construct(){
            $this->relatorio = new Publico();
        }

        public function relatorio($email){
            
             return $this->relatorio->exibirRelatorio($email);
        }
    }
?>