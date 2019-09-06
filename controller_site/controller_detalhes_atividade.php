<?php
    require_once dirname(__FILE__).'./../model/publico.php';

    class ControllerDetalhesAtividade{
        private $detalhesAtividade;

        public function __construct(){
            $this->detalhesAtividade = new Publico();
        }

        public function detalhesAtividade($id){
            return $this->detalhesAtividade->exibirDetalhesAtividade($id);

            // $p = $this->detalhesAtividade->exibirDetalhesAtividade($id);
            // foreach($p as $i => $pb){
            //     echo $pb['nome_atividade'] . ' - '. $pb['evento_id'] . ' - '. $pb['tipo_atividade_id'] 
            //     . ' - '. $pb['descricao'] . ' - '. $pb['data'] . ' - '. $pb['hora_inicio']
            //     . ' - '. $pb['hora_fim'] . ' - '. $pb['capacidade'] . '<br>';
            // }
            
            //var_dump($p);
        }

        public function colaboradoresAtividade($id){
            return $this->detalhesAtividade->exibirColaboradoresAtividade($id);

            // $p = $this->detalhesAtividade->exibirColaboradoresAtividade($id);
            // foreach($p as $pb){
            //     echo $pb['nome'] . '<br>';
            // }
            
            //var_dump($p);
        }

        public function inscritosAtividade($id){
            return $this->detalhesAtividade->quantidadeInscritos($id);
        }
    }

     $c = new ControllerDetalhesAtividade();

    
?>

