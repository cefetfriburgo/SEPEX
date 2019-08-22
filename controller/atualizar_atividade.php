<?php
    require_once "./../model/atividade.php";

    $idAtividade = $_POST['id'];
    $nome_atividade = $_POST['titulo'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $data = $_POST['data'];
    $etiqueta = $_POST['etiqueta'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){
            if(!isset($idAtividade) || !isset($nome_atividade) || !isset($descricao) || !isset($capacidade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($hora_inicio) || !isset($hora_fim) || !isset($data)){
                header('location: ./../view/admin/atividade/editar.php');
            }else{
                $this->atividade->atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta);
                header('location: ./../view/admin/atividade/listar.php');
                
            }
        }
    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta);

?>