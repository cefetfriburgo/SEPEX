<?php
    require_once "./../model/evento.php";

    $nome = $_POST['titulo'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        
        public function pesquisar($nome){
            if(!isset($nome)){
                header('location: ./../view/admin/evento/listar.php');
            }else{
                return $this->evento->pesquisarEvento($nome);                
            }            
        }
    }

    $ctrlEvento = new ControllerEvento();
   

?>