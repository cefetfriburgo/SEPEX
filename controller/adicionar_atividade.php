<?php
    require_once "./../model/atividade.php";

    $nome_atividade = $_POST['titulo'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function adicionar( $nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade){
            if(!isset($nome_atividade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($descricao) || !isset($capacidade)){
                header('location: ./../view/admin/atividade/adicionar.php');
            }else{
                $this->evento->adicionarEvento($nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade);
                header('location: ./../view/admin/atividade/listar.php');
            }
        }

    }

    $ctrlAtividade = new ControllerAtividade();
        
    //$ctrlAtividade->adicionar( $nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade);
    

?>