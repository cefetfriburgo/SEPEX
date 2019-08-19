<?php
    require_once "./../model/atividade.php";

    $id = $_GET['id'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function excluir($id){
            if(!isset($id)){
                header('location: ./../view/admin/atividade/listar.php');
            }else{
                $this->atividade->excluirAtividade($id);
                header('location: ./../view/admin/atividade/listar.php');
            }
        }
    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->excluir($id);

?>