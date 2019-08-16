<?php
    require_once dirname(__FILE__)."./../model/evento.php";

    $id = $_POST['id'];
    $nome = $_POST['titulo'];
    $ano = $_POST['ano'];
    $semestre = $_POST['semestre'];

    class ControllerEvento{
        private $evento;

        public function __construct(){            
            $this->evento = new Evento();
        }

        public function atualizar($id, $nome, $ano, $semestre){
            if(!isset($id) || !isset($nome) || !isset($ano) || !isset($semestre)){
                header('location: ./../view/admin/evento/editar.php');
            }else{
                $this->evento->atualizarEvento($id, $nome, $ano, $semestre);
                header('location: ./../view/admin/evento/listar.php');
            }
        }

        /*public function nome($id){
            return $this->evento->nomeEvento($id);            
        }*/

    }

    $ctrlEvento = new ControllerEvento();
    $ctrlEvento->atualizar($id, $nome, $ano, $semestre);
    
    //echo $lista['nome'];

   
?>