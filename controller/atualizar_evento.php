<?php
    require_once "./../model/evento.php";

    //$nome = $_POST['titulo'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function atualizar($id, $nome, $ano, $semestre){
            if(!isset($id) || !isset($nome) || !isset($ano) || !isset($semestre)){
                header('location: ./../view/admin/evento/atualizar.php');
            }else{
                $this->evento->atualizarEvento($id, $nome, $ano, $semestre);
            }
        }

    }

    $ctrlEvento = new ControllerEvento();
   
?>