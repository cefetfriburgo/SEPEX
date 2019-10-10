<?php
    require_once dirname(__FILE__)."./../model/usuario.php";

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['perfil'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $perfil = $_POST['perfil']; 

        $ctrlUsuario = new ControllerUsuario();
        $ctrlUsuario->adicionar($email, $senha, $perfil);
    }        

    class ControllerUsuario{
        private $usuario;

        public function __construct(){            
            $this->model = new Model();
        }

        public function adicionar($email, $senha, $perfil){            
            $this->model->adicionarUsuario($email, $senha, $perfil);
            header('location:./../view\admin\principal');
        }
    }

    $ctrlUsuario = new ControllerUsuario();
    $ctrlUsuario->adicionar($email, $senha, $perfil);
?>