<?php
    require('../model/publico.php');

    class ControllerConsultarAtividade{
        private $consultarAtividade;

        public function __construct(){
            $this->consultarAtividade = new Publico();
        }

        public function consultarAtividade($email){
             return $this->consultarAtividade->consultarAtividade($email);
            // $p = $this->consultarAtividade->consultarAtividade($email);

            // foreach($p as $e){
            //     echo $e['nome_atividade'] . '<br>';
            //     echo $e['data'] . '<br>';
            //     echo $e['hora_inicio'] . '<br>';
            //     echo $e['hora_fim'] . '<br>';
            // }
        }

    }

    // $c = new ControllerConsultarAtividade();
    // $c->consultarAtividade('p@cefet-rj.br');
   
    
?>

