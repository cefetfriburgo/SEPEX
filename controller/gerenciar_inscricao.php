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

        public function presenca($id, $presenca){
            $this->gerenciar->confirmarPresenca($id, $presenca);
        }
    }

    $c = new GerenciarInscricao();
    $lista = $c->gerenciar();

?>