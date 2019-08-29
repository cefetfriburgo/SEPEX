<?php
    require dirname(__FILE__).'./../model/publico.php';

    class ControllerDetalhesAtividade{
        private $detalhesAtividade;

        public function __construct(){
            $this->detalhesAtividade = new Publico();
        }

        public function detalhesAtividade($id){
            return $this->detalhesAtividade->exibirDetalhesAtividade($id);
            //$p = $this->detalhesAtividade->exibirDetalhesAtividade($id);

            // foreach($p as $i => $pb){
            //     echo $pb['nome_atividade'] . ' - '. $pb['idEvento'] . ' - '. $pb['idTipoAtividade'] 
            //     . ' - '. $pb['descricao'] . ' - '. $pb['data'] . ' - '. $pb['hora_inicio']
            //     . ' - '. $pb['hora_fim'] . ' - '. $pb['capacidade'] . '<br>';
            // }
            
            //var_dump($p);
        }

        public function colaboradoresAtividade($id){
            return $this->detalhesAtividade->exibirColaboradoresAtividade($id);
            //$p = $this->detalhesAtividade->exibirColaboradoresAtividade($id);

            // foreach($p as $pb){
            //     echo $pb['nome'] . '<br>';
            // }
            
            //var_dump($p);
        }
    }

    $c = new ControllerDetalhesAtividade();
    $c->detalhesAtividade(4);
    $c->colaboradoresAtividade(4);
    
?>

