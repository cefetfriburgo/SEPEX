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
            if(!isset($id) || !isset($nome) || !isset($ano) || !isset($semestre) || !isset($data_inicio) || !isset($hora_inicio) || !isset($data_fim) || !isset($hora_fim)){
                header('location: ./../view/admin/evento/editar.php');
            }else{
                $this->evento->atualizarEvento($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
                header('location: ./../view/admin/evento/listar.php');
            }
        }

        /*public function nome($id){
            return $this->evento->nomeEvento($id);            
        }*/

    }

    $ctrlEvento = new ControllerEvento();
    $ctrlEvento->atualizar($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim);
    
    //echo $lista['nome'];

   
?>