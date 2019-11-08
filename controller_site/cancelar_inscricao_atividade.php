<?php
    require_once './../model/publico.php';
  

    $cpf = str_replace('.', '', $_POST['cpf']);
    $cpf = str_replace('-', '', $cpf);
    $nome_atividade = $_POST['atividade'];

    class CancelarInscricaoAtividade{
        private $cancel;

        public function __construct(){
            $this->cancel = new Publico();
        }

        public function cancelarInscricaoAtividade($cpf, $nome_atividade){            
            return $this->cancel->inscricaoAtividade($cpf, $nome_atividade);
            
        }

    }

    $c = new CancelarInscricaoAtividade();
    echo $c->cancelarInscricaoAtividade($cpf, $nome_atividade);


?>