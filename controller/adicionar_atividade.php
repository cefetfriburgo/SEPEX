<?php
    require_once "./../model/atividade.php";

    $nome_atividade = $_POST['titulo'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = 5;//$_POST['capacidade'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_termino'];
    $data = $_POST['data'];
    $etiqueta = $_POST['etiqueta'];
    

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function adicionar( $nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $hora_inicio, $hora_fim, $data, $etiqueta){
            if(!isset($nome_atividade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($descricao) || !isset($capacidade) || !isset($hora_inicio) || !isset($hora_fim) || !isset($data)){
                header('location: ./../view/admin/atividade/adicionar.php');
            }else{
                $this->atividade->adicionarAtividade($nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta);
                header('location: ./../view/admin/atividade/listar.php');
            }
        }

    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->adicionar($nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $hora_inicio, $hora_fim, $data, $etiqueta);
        
    //$ctrlAtividade->adicionar( $nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $hora_inicio, $hora_fim, $data);
?>