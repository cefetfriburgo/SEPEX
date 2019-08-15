<?php
    require_once "./../model/atividade.php";

    $nome_atividade = $_POST['titulo'];

    class ControllerAtividade{
        private $atividade;

        public function __construct(){            
            $this->atividade = new Atividade();
        }

        
        public function pesquisar($nome_atividade){
            if(!isset($nome_atividade)){
                header('location: ./../view/admin/atividade/listar.php');
            }else{
                return $this->atividade->pesquisarAtividade($nome_atividade);
            }            
        }
    }

    $ctrlAtividade = new ControllerAtividade();
   

?>