<?php
    require_once "./../model/evento.php";

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function listar(){
            $this->evento->listarEvento();
        }

        public function pesquisar($nome){
            if(!isset($nome)){
                header('location: ./../view/admin/evento/listar.php');
            }else{
                $this->evento->pesquisarEvento($nome);
            }
            
        }

        public function atualizar($id, $nome, $ano, $semestre){
            $this->evento->atualizarEvento($id, $nome, $ano, $semestre);
        }

        public function adicionar( $nome, $ano, $semestre){
            if(!isset($nome) || !isset($ano) || !isset($semestre)){
                header('location: ./../view/admin/evento/adicionar.php');
            }else{
                $this->evento->adicionarEvento($nome, $ano, $semestre);
            }
        }

        public function excluir($id){
            $this->evento->excluirEvento($id);
        }


    }

    $ctrlEvento = new ControllerEvento();
    //$ctrlEvento->listar();
    //$ctrlEvento->pesquisar(null);
    //$ctrlEvento->atualizar(3, 'Boostrap6', 2017, 'Segundo Semestre');
    //$ctrlEvento->listar();
    //$ctrlEvento->adicionar('Extensao', 2000, 'Segundo semestre');
    //$ctrlEvento->excluir(7);

?>