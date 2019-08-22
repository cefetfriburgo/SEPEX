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

            if (!isset($_POST) || empty($_POST)){
                $erro = 'Por favor, preencha corretamente os campos<br>';
            }
           
            foreach ($_POST as $campo => $valor){
                $campo = trim(strip_tags($valor));
                if (empty($valor)){
                    $erro = 'Por favor, preencha todos os campos<br>';
                }
            }

            if ((!isset($nome) || is_numeric($nome)) && !$erro){
                $erro = 'O título não pode conter apenas números, por favor, preencha-o corretamente!<br>';
            }

            if ((!isset($ano) || !is_numeric($ano)) && !$erro){
                $erro = 'O ano deve ser um valor numérico, por favor, preencha-o corretamente!<br>';
            }

                $data = explode("-","$data_inicio"); 
                $d = $data[2];
                $m = $data[1];
                $y = $data[0];

                if ($y < 2019){
                    $erro = 'A data de início é inválida, por favor, preencha-a corretamente!<br>'; 
               }

               $dataf = explode("-","$data_fim"); 
                $df = $dataf[2];
                $mf = $dataf[1];
                $yf = $dataf[0];

                if ($yf < 2019){
                    $erro = 'A data de término é inválida, por favor, preencha-a corretamente!<br>'; 
               }

               if(($ano < 2019) || ($ano > 3000)) {
                $erro = 'Ano é inválido';
               }
                                   
            if ($erro) {
                echo $erro. "<br>";
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