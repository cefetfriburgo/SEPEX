<?php
require dirname(__FILE__).'./../model/publico.php';

    class ControllerInscricao{
        private $inscricao;
        public function __construct(){
            $this->inscricao = new Publico();
        }

        public function inscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade){
            $this->inscricao->registrarInscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade);
            
        }

        public function relatorio($email){
            // $email = $_POST['email'];
             return $this->inscricao->exibirRelatorio($email);
        }
    }

    $c = new ControllerInscricao();
    // $c->inscricao(1, 'Pedreiro', 'pedreiro@cefet-rj.br', '18720072015', '2');
    //  $lista = $c->relatorio();

    //  foreach($lista as $l){
    //      echo $l['nome_atividade'];
    //  }

?>