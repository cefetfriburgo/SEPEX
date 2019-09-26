<?php
    require dirname(__FILE__).'./../model/evento.php';

    class GerenciarInscricao{
        private $gerenciar;

        public function __construct(){
            $this->gerenciar = new Evento();
        }

        public function gerenciar(){
            return $this->gerenciar->gerenciarInscricao();
        }

        public function listar($atividade_id){
            return $this->gerenciar->listarParticipante($atividade_id);
        }

        public function inicio($atividade_id){
            return $this->gerenciar->inicioAtividade($atividade_id);
        }


    }

    $c = new GerenciarInscricao();

    $lista = $c->gerenciar();

    

    // foreach($lista as $l1){
    //     echo $l1['nome_atividade'] . '    '   . $l1['total'];
    // }

  

?>