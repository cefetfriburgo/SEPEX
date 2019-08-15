<?php
    require_once "./../model/atividade.php";

    $id = $_POST['id'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function excluir($id){
            if(!isset($id)){
                header('location: ./../view/admin/atividade/excluir.php');
            }else{
                $this->evento->excluirAtividade($id);
            }
        }
    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->excluir($id);

?>