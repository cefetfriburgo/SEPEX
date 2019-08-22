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

            $erro = false;
            if(!isset($nome) || !isset($ano) || !isset($semestre) || !isset($data_inicio) || !isset($hora_inicio) || !isset($data_fim) || !isset($hora_fim)){
                header('location: ./../view/admin/evento/adicionar.php');
            }

            if(!isset($_POST) || empty($_POST)){
                $erro = 'Nada foi preenchido.';
            }

            foreach ($_POST as $key => $value) {
                $key = trim(strip_tags($value));
                if(empty($value)){
                    $erro = 'Existem campos em branco.';
                }
            }

            if (!is_string($nome)) {
                $erro = 'Nome deve ser um texto.';
            }

            if ((!isset($ano) || !is_numeric($ano)) && !$erro ) {
                $erro = 'O ano deve ser um valor numérico.';
            }

            if($erro){
                echo $erro;
            }

            else{
                $this->evento->adicionarEvento($nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
                header('location: ./../view/admin/evento/listar.php');
            }
        }
    }

    $ctrlEvento = new ControllerEvento();
        
    $ctrlEvento->adicionar($nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
    

?>