<?php
    require_once "./../model/atividade.php";

    $idAtividade = $_POST['id'];
    $nome_atividade = $_POST['titulo'];
    $idEvento = $_POST['evento'];
    $idTipoAtividade = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $data = $_POST['data'];
    $etiqueta = $_POST['etiqueta'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        public function atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){
            if(!isset($idAtividade) || !isset($nome_atividade) || !isset($descricao) || !isset($capacidade) || !isset($idEvento) || !isset($idTipoAtividade) || !isset($hora_inicio) || !isset($hora_fim) || !isset($data)){
                header('location: ./../view/admin/atividade/editar.php');
            }
            $erro = false;
            if(!isset($id) || !isset($nome_atividade) || !isset($ano) || !isset($semestre) || !isset($data) || !isset($hora_inicio) || !isset($hora_fim)){
                header('location: ./../view/admin/atividade/editar.php');
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

            if ((!isset($nome_atividade) || is_numeric($nome_atividade)) && !$erro){
                $erro = 'O título não pode conter apenas números, por favor, preencha-o corretamente!<br>';
            }

            if ((!isset($ano) || !is_numeric($ano)) && !$erro){
                $erro = 'O ano deve ser um valor numérico, por favor, preencha-o corretamente!<br>';
            }

            if ($ano < 2019 || $ano >3000){
                $erro = 'O ano é inválido, por favor, preencha-o corretamente!<br>';
            }

                $data = explode("-","$data"); 
                $d = $data[2];
                $m = $data[1];
                $y = $data[0];

                if ($y < 2019 || $y > 2050){
                    $erro = 'A data é inválida, por favor, preencha-a corretamente!<br>'; 
               }


                                   
            if ($erro) {
                echo $erro. "<br>";
            }
            else{
                $this->atividade->atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta);
                header('location: ./../view/admin/atividade/listar.php');
                
            }
        }
    }

    $ctrlAtividade = new ControllerAtividade();
    $ctrlAtividade->atualizar($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta);

?>