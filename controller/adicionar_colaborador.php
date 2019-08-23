<?php
    require_once dirname(__FILE__)."./../model/atividade.php";

    $array = [];
    
    for($i = 1; $i <= sizeof($_POST); $i++){
        if(isset($_POST['nome'.$i]))
            $array[] = $_POST['nome'.$i]; 
    }

    class ControllerColaborador{
        private $colaborador;

        public function __construct(){            
            $this->colaborador = new Atividade();
        }

        public function adicionar($array){            
            $this->colaborador->adicionarColaborador($array);
            header('location:./../view\admin\atividade\colaborador.php');
        }

    }

    $ctrlColaborador = new ControllerColaborador();
    $ctrlColaborador->adicionar($array);

    // foreach($lista as $n)
    //     echo $n['nome'];
    
?>