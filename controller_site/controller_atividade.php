<?php
    require('../model/publico.php');

    class ControllerAtividade{
        private $atividade;

        public function __construct(){
            $this->atividade = new Publico();
        }

        public function atividade(){
            return $this->atividade->exibirAtividade();
            // $p = $this->atividade->exibirAtividade();

            // foreach($p as $pb){
            //     echo $pb['nome_atividade'] . '-->' . $pb['hora_fim'] . '<br>';
            // }
        }
    }

    // $c = new ControllerAtividade();
    // $c->atividade();
?>

