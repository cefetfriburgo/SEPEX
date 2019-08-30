<?php
require('../model/publico.php');

    class ControllerInscricao{
        private $inscricao;
        public function __construct(){
            $this->inscricao = new Publico();
        }

        public function inscricao($atividade_id, $nome_aluno, $email, $cpf){
            $this->inscricao->registrarInscricao($atividade_id, $nome_aluno, $email, $cpf);
            
        }
    }

    // $c = new ControllerInscricao();
    // $c->inscricao(1, 'Pedreiro', 'pedreiro@cefet-rj.br');

?>