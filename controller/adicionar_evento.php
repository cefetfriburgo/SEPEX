<?php
    require_once "./../model/evento.php";

    $nome = $_POST['titulo'];
    $ano = $_POST['ano'];
    $semestre = $_POST['semestre'];
    $data_inicio = $_POST['data_inicio'];
    $hora_inicio = $_POST['hora_inicio'];
    $data_fim = $_POST['data_fim'];
    $hora_fim = $_POST['hora_fim'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function adicionar( $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            if(!isset($nome) || !isset($ano) || !isset($semestre) || !isset($data_inicio) || !isset($hora_inicio) || !isset($data_fim) || !isset($hora_fim)){
                header('location: ./../view/admin/evento/adicionar.php');
            }else{
                $this->evento->adicionarEvento($nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
                header('location: ./../view/admin/evento/listar.php');
            }
        }

    }

    $ctrlEvento = new ControllerEvento();
        
    $ctrlEvento->adicionar($nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
    

?>