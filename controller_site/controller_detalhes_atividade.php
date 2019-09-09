<?php
    require_once dirname(__FILE__).'./../model/publico.php';

    class ControllerDetalhesAtividade{
        private $detalhesAtividade;

        public function __construct(){
            $this->detalhesAtividade = new Publico();
        }

        public function detalhesAtividade($id){
            return $this->detalhesAtividade->exibirDetalhesAtividade($id);

           
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

        public function datasAtividade($id){
            return $this->detalhesAtividade->exibirDatasAtividade($id);
        }
    }

     $c = new ControllerDetalhesAtividade();
    //  $lista = $c->detalhesAtividade(1);
     
    //  foreach($lista as $l){
    //      echo $l['data'];
    //  }

    
?>

