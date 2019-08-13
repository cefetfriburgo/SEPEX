<?php
    require_once "./../model/evento.php";

    $nome = $_POST['titulo'];
    $ano = $_POST['ano'];
    $semestre = $_POST['semestre'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function adicionar( $nome, $ano, $semestre){
            if(!isset($nome) || !isset($ano) || !isset($semestre)){
                header('location: ./../view/admin/evento/adicionar.php');
            }else{
                $this->evento->adicionarEvento($nome, $ano, $semestre);
                header('location: ./../view/admin/evento/listar.php');
            }
        }

    }

    $ctrlEvento = new ControllerEvento();
        
    $ctrlEvento->adicionar($nome, $ano, $semestre);
    

?>