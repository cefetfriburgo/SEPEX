<?php
require('../model/publico.php');

    class ControllerInscricao{
        private $inscricao;
        public function __construct(){
            $this->inscricao = new Publico();
        }

        public function inscricao($atividade_id, $nome_aluno, $email){
            $this->inscricao->registrarInscricao($atividade_id, $nome_aluno, $email);
            
        }
    }

    $c = new ControllerInscricao();
    $c->inscricao(1, 'Pedro', 'pedro@cefet-rj.br');

?>