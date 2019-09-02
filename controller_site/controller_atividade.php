<?php
    require dirname(__FILE__).'./../model/publico.php';

    class ControllerAtividade{
        private $atividade;

        public function __construct(){
            $this->atividade = new Publico();
        }

        public function atividade(){
           return $this->atividade->exibirAtividade();
            
            // $p = $this->atividade->exibirAtividade();

            // foreach($p as $pb){
            //     echo $pb['nome_atividade'] . ' -->' . $pb['hora_fim'] . ' -->' . $pb['atividade_id'] . ' -->' . $pb['data'] . '<br>';
            // }
        }
    }

    //  $c = new ControllerAtividade();
    //  $c->atividade();
    $pedro = 'pedrones';
?>

