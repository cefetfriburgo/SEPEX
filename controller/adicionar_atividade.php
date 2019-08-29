<?php
    require_once "./../model/atividade.php";

    $nome_atividade = $_POST['titulo'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_termino'];
    $data = $_POST['data'];
    $etiqueta = $_POST['etiqueta'];
    //$tamanho = $_POST['ncolaborador'];
    $array = [];
    $papel = [];

    for($i=1; $i<= sizeof($_POST); $i++){
        if(isset($_POST['colaborador'.$i])){
            $array[$i] = $_POST['colaborador'.$i];
        }
        if(isset($_POST['papel'.$i])){
            $papel[] = $_POST['papel'.$i];
        }
    }
    
    
    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function adicionar( $nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $hora_inicio, $hora_fim, $data, $etiqueta, $array, $papel){
            if(!isset($nome_atividade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($descricao) || !isset($capacidade) || !isset($hora_inicio) || !isset($hora_fim) || !isset($data)){
                header('location: ./../view/admin/atividade/adicionar.php');
            }
            
            $erro = false;
            /*if (!isset($_POST) || empty($_POST)){
                $erro = 'Por favor, preencha corretamente os campos<br>';
            }

            foreach ($_POST as $campo => $valor){
                $campo = trim(strip_tags($valor));
                if (empty($valor)){
                    $erro = 'Por favor, preencha todos os campos<br>';
                }
            }*/

            if ((!isset($nome_atividade) || is_numeric($nome_atividade)) && !$erro){
                $erro = 'O nome da atividade não pode conter apenas números. Por favor, preencha-o corretamente!<br>';
            }

            if ((!isset($descricao) || is_numeric($descricao)) && !$erro){
                $erro = 'A descrição não pode conter apenas números. Por favor, preencha-a corretamente!<br>';
            }

            if($capacidade <= 0 || !is_numeric($capacidade)) {
                $erro = 'A quantidade de vagas deve ser numérica. Por favor, preencha-a corretamente!<br>';
            }

            $horai = explode(":","$hora_inicio"); 
                $h = $horai[0];
                $m = $horai[1];
                

                if ($h > 23 || $h < 0){
                    $erro = 'A hora de início é inválida. Por favor, preencha-a corretamente!<br>'; 
                }

                if ($m > 59 || $m < 0){
                    $erro = 'A hora de início é inválida. Por favor, preencha-a corretamente!<br>';
                }

            $horaf = explode(":","$hora_fim"); 
                $hf = $horaf[0];
                $mf = $horaf[1];
                

                if ($hf > 23 || $hf < 0){
                    $erro = 'A hora de término é inválida. Por favor, preencha-a corretamente!<br>'; 
                }

                if ($mf > 59 || $mf < 0){
                    $erro = 'A hora de término é inválida. Por favor, preencha-a corretamente!<br>';
                }

            $dt = explode("-","$data"); 
                $d = $dt[2];
                $m = $dt[1];
                $y = $dt[0];

                if ($y < 2019){
                    $erro = 'A data é inválida. Por favor, preencha-a corretamente!<br>'; 
               }
            if($idEvento == "xxx"){
                $erro = 'Selecione um evento que já esteja disponível.<br>';
            }

            if($idTipoAtividade == "xxx"){
                $erro = 'Selecione um tipo de atividade que já esteja disponível.<br>';
            }
                       
            if ($erro) {
                echo $erro. "<br>";
            } else{
                $this->atividade->adicionarAtividade($nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $array, $papel);
                header('location: ./../view/admin/atividade/listar.php');
                // foreach($array as $a){
                //     echo $a . '<br>';
                // }
            }
        }

    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->adicionar($nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $hora_inicio, $hora_fim, $data, $etiqueta, $array, $papel);
        
?>