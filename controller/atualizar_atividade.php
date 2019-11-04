<?php
    require_once "./../model/atividade.php";

    $idAtividade = $_POST['id'];
    $nome_atividade = $_POST['nome_atividade'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $data = $_POST['data'];
    $etiqueta = $_POST['etiqueta'];
    $local = $_POST['local'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $local){

            if(!isset($idAtividade) || !isset($nome_atividade) || !isset($descricao) || !isset($capacidade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($hora_inicio) || !isset($hora_fim) || !isset($data) || !isset($local)){
                header('location: ./../view/admin/atividade/editar.php');
            }
            $erro = false;

            if ((!isset($local) || is_numeric($local)) && !$erro){
                $erro = 'O local não pode conter apenas números, por favor, preencha-o corretamente!<br>';
            }

            if ((!isset($nome_atividade) || is_numeric($nome_atividade)) && !$erro){
                $erro = 'O título não pode conter apenas números, por favor, preencha-o corretamente!<br>';
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

                $dat = explode("-","$data"); 
                $d = $dat[2];
                $m = $dat[1];
                $y = $dat[0];

                if ($y < 2019 || $y > 2050){
                    $erro = 'A data é inválida. Por favor, preencha-a corretamente!<br>'; 
               }

                                   
            if ($erro) {
                echo $erro. "<br>";
            }
            else{
                $this->atividade->atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $local);
                // header('location: ./../view/admin/atividade/listar.php');
                
            }
        }

        public function adicionarEtiqueta($idAtividade, $etiqueta){
            $this->atividade->atualizarEtiqueta($idAtividade, $etiqueta);
            header('location: ./../view/admin/atividade/listar.php');
        }
    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $local);

    $palavras_chave = explode(", ", $etiqueta);
    foreach($palavras_chave as $pc){ 
        $ctrlAtividade->adicionarEtiqueta($idAtividade, $pc);
    }

?>