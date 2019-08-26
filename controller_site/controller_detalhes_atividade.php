<?php
    require('../model/publico.php');

    class ControllerDetalhesAtividade{
        private $detalhesAtividade;

        public function __construct(){
            $this->detalhesAtividade = new Publico();
        }

        public function detalhesAtividade($id){
            return $this->detalhesAtividade->exibirDetalhesAtividade();
            // $p = $this->detalhesAtividade->exibirDetalhesAtividade($id);

            // foreach($p as $pb){
            //     echo $pb['nome'] . '-->' . $pb['nome_atividade'] . '<br>';
            // }
        }
    }

    // $c = new ControllerDetalhesAtividade();
    // $c->detalhesAtividade(4);
?>

