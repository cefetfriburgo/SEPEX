<?php
    require_once dirname(__FILE__)."./../model/evento.php";

    $id = $_POST['id'];
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

        public function atualizar($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
           
            $erro = false;
            if(!isset($id) || !isset($nome) || !isset($ano) || !isset($semestre) || !isset($data_inicio) || !isset($hora_inicio) || !isset($data_fim) || !isset($hora_fim)){
                header('location: ./../view/admin/evento/editar.php');
            }

            if (!isset($_POST) || empty($_POST)){
                $erro = 'Nada foi postado';
            }
           
            foreach ($_POST as $campo => $valor){
                $campo = trim(strip_tags($valor));
                if (empty($valor)){
                    $erro = 'Existem campos em branco';
                }
            }

            if ((!isset($nome) || is_numeric($nome)) && !$erro){
                $erro = 'Nome não deve ser numérico';
            }

            if ((!isset($ano) || !is_numeric($ano)) && !$erro){
                $erro = 'Ano deve ser um valor numérico';
            }

            function ValidaData($data_inicio){
                $data = explode("-","$data_inicio"); 
                $d = $data[2];
                $m = $data[1];
                $y = $data[0];
             
                $res = checkdate($m,$d,$y);
                if ($res == 0){
                   echo "Data inválida";
                }

                if ($y < 2019){
                    echo "Ano da data inválido";
                }
            }
            //validacao nao esta funcionando
                       
            if ($erro) {
                echo $erro;
            } else{
                $this->evento->atualizarEvento($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
                header('location: ./../view/admin/evento/listar.php');
            }
        }
    }

    $ctrlEvento = new ControllerEvento();
    $ctrlEvento->atualizar($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);  
?>