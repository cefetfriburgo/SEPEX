<?php
    require_once "./../model/evento.php";

    $id = $_GET['id'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function excluir($id){
            if(!isset($id)){
                header('location: ./../view/admin/evento/listar.php');
            }else{                
                $this->evento->excluirEvento($id);
                header('location: ./../view/admin/evento/listar.php');
            }
        }
    }

    $ctrlEvento = new ControllerEvento();
    $ctrlEvento->excluir($id);

?>