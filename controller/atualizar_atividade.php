<?php
    require_once "./../model/atividade.php";

    $nome_atividade = $_POST['titulo'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade){
            if(!isset($idAtividade) || !isset($nome_atividade) || !isset($descricao) || !isset($capacidade) || !isset($idEvento) || !isset($idTipoAtividade)){
                header('location: ./../view/admin/atividade/atualizar.php');
            }else{
                $this->atividade->atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade);
            }
        }
    }

    $ctrlAtividade = new ControllerAtividade();

?>