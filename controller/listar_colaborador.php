<?php
    require_once dirname(__FILE__)."./../model/atividade.php";



    class ControllerColaborador{
        private $colaborador;

        public function __construct(){            
            $this->colaborador = new Atividade();
        }

        public function listar(){
            return $this->colaborador->listarColaborador();
        }

    }

    $ctrlColaborador = new ControllerColaborador();
    $lista = $ctrlColaborador->listar();

    // foreach($lista as $n)
    //     echo $n['nome'];
    
?>