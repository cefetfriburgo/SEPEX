<?php
    require_once "./../model/atividade.php";

    $nome_atividade = $_POST['titulo'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];

    $hide = $_POST['hide'];
    $datas = [];
    
   
    
    
    for($i=0; $i<=$hide; $i++){
        if(isset($_POST['data'.$i]) && !empty($_POST['data'.$i]) && isset($_POST['hora_inicio'.$i]) && !empty($_POST['hora_inicio'.$i]) && isset($_POST['hora_termino'.$i]) && !empty($_POST['hora_termino'.$i])){
            array_push($datas, array(
                'data' => $_POST['data'.$i],
                'hora_inicio' => $_POST['hora_inicio'.$i],
                'hora_fim' => $_POST['hora_termino'.$i]
            ));            
        }
    }

   
   
    // $data = $_POST['data'];
    // $hora_inicio = $_POST['hora_inicio'];
    // $hora_fim = $_POST['hora_termino'];

    $palavra_chave = $_POST['etiqueta'];    
    $local = $_POST['local'];
    

    $array = [];
    $papel = [];

    for($i=0; $i<= sizeof($_POST); $i++){
        if(isset($_POST['oculto'.$i])){
            array_push($array, array(
                'nome' => $_POST['oculto'.$i],
                'papel' => $_POST['papel'.$i]
            ));
        }
    }

    //foreach($array as $ar){ echo $ar['nome']; }

    // if(isset($palavra_chave)){
    //     $etiqueta = explode(",", $palavra_chave);
    // }    
    
    class ControllerAtividade{
        private $atividade;
        private $err;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function adicionar( $nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $datas, $array, $local){
            if(!isset($nome_atividade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($descricao) || !isset($capacidade) || !isset($datas) || !isset($local)){
                header('location: ./../view/admin/atividade/adicionar.php');
            }
            
            $erro = false;

            if ((!isset($local) || is_numeric($local)) && !$erro){
                $erro = 'O local não pode conter apenas números. Por favor, preencha-o corretamente!<br>';
            }
         
            if ((!isset($nome_atividade) || is_numeric($nome_atividade)) && !$erro){
                $erro = 'O nome da atividade não pode conter apenas números. Por favor, preencha-o corretamente!<br>';
            }

            if ((!isset($descricao) || is_numeric($descricao)) && !$erro){
                $erro = 'A descrição não pode conter apenas números. Por favor, preencha-a corretamente!<br>';

            }

            if($capacidade <= 0 || !is_numeric($capacidade)) {
                $erro = 'A quantidade de vagas deve ser numérica. Por favor, preencha-a corretamente!<br>';
            }

            foreach($datas as $hora){
                $hor = $hora['hora_inicio'];
                $horai = explode(":","$hor"); 
                $h = $horai[0];
                $m = $horai[1];                    
                if ($h > 23 || $h < 0){
                    $erro = 'A hora de início é inválida. Por favor, preencha-a corretamente!<br>'; 
                }
                if ($m > 59 || $m < 0){
                    $erro = 'A hora de início é inválida. Por favor, preencha-a corretamente!<br>';
                }
            }

            foreach($datas as $hora){
                $hor = $hora['hora_fim'];
                $horaf = explode(":","$hor"); 
                $hf = $horaf[0];
                $mf = $horaf[1];
                    

                if ($hf > 23 || $hf < 0){
                    $erro = 'A hora de término é inválida. Por favor, preencha-a corretamente!<br>'; 
                }

                if ($mf > 59 || $mf < 0){
                    $erro = 'A hora de término é inválida. Por favor, preencha-a corretamente!<br>';
                }
            }

            foreach($datas as $dia){
                $dat = $dia['data'];
                $dt = explode("-","$dat"); 
                $d = $dt[2];
                $m = $dt[1];
                $y = $dt[0];
            }

            if ($y < 2019){
                    $erro = 'A data é inválida. Por favor, preencha-a corretamente!'; 
            }

            if($idEvento == "xxx"){
                $erro = 'Selecione um evento que já esteja disponível.';
            }

            if($idTipoAtividade == "xxx"){
                $erro = 'Selecione um tipo de atividade que já esteja disponível.';
            }
                       
            if ($erro) {
                $err = 1;              
                 header('location: ./../view/admin/atividade/adicionar.php?erro="'.$erro.'"');
            } else{
                $this->atividade->adicionarAtividade( $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $datas, $array, $local);
                    header('location: ./../view/admin/atividade/listar.php');              
            }
        }

        public function etiqueta($etiqueta){
            // if($err == 1){}
            //else{ 
               $this->atividade->adicionarEtiqueta($etiqueta);
               // header('location: ./../view/admin/atividade/listar.php');
            //}
        }

    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->adicionar($nome_atividade, $idEvento, $idTipoAtividade, $descricao, $capacidade, $datas, $array, $local);
    $ctrlAtividade->etiqueta($palavra_chave);

    //$nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $array, $papel, $local
    // foreach($datas as $l){
    //     $dat = $l['data'];
    //     $dt = explode("-","$dat"); 
    //     $d = $dt[2];
    //     $m = $dt[1];
    //     $y = $dt[0];

    //     echo "$d - $m - $y <br>";
    // }
?>