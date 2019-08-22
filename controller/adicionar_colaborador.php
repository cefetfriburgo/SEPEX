<?php
    require_once dirname(__FILE__)."./../model/atividade.php";

   

    class ControllerColaborador{
        private $colaborador;

        public function __construct(){            
            $this->colaborador = new Atividade();
        }

        public function adicionar($array){
            return $this->colaborador->adicionarColaborador($array);
            header('location:./../view/admin/atividade/colaborador.php');
        }

    }

    $ctrlColaborador = new ControllerColaborador();
    $ctrlColaborador->adicionar($array);

    // foreach($lista as $n)
    //     echo $n['nome'];
    
?>