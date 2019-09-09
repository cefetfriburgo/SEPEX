<?php
require dirname(__FILE__).'./../model/publico.php';

    class ControllerRelatorio{
        private $relatorio;
        public function __construct(){
            $this->relatorio = new Publico();
        }

        public function relatorio($email){
            // $email = $_POST['email'];
             return $this->relatorio->exibirRelatorio($email);
        }

        public function evento(){
            return $this->relatorio->exibirEvento();
        }


    }

    // $c = new ControllerRelatorio(); $lista = $c->relatorio("pedro@cefet-rj.br"); foreach($lista as $l){
    //     echo $l['nome_atividade'];
    //      echo $l['data'];
    //     echo $l['hora_inicio']; 
    //      echo $l['hora_fim'];                       
    //  }
?>