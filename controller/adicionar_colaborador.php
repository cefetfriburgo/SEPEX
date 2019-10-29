<?php
    require_once dirname(__FILE__)."./../model/atividade.php";

    if(isset($_POST['nome']) && isset($_POST['sobre'])){
        $nome = $_POST['nome'];
        $sobre = $_POST['sobre'];
    }

    class ControllerColaborador{
        private $colaborador;

        public function __construct(){            
            $this->colaborador = new Atividade();
        }

        public function adicionar($nome, $sobre){            
            $this->colaborador->adicionarColaborador($nome, $sobre);
            header('location:./../view\admin\principal');
        }
    }

    $ctrlColaborador = new ControllerColaborador();
    $ctrlColaborador->adicionar($nome, $sobre);

?>