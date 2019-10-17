<?php
    require_once dirname(__FILE__)."./../model/usuario.php";

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['perfil']) && isset($_POST['confirmar-nova-senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $perfil = $_POST['perfil']; 
        $confirmar_senha = $_POST['confirmar-nova-senha'];

        $ctrlUsuario = new ControllerUsuario();
        $ctrlUsuario->adicionar($email, $senha, $perfil, $confirmar_senha);
    }        

    class ControllerUsuario{
        private $usuario;

        public function __construct(){            
            $this->model = new Model();
        }

        public function adicionar($email, $senha, $perfil, $confirmar_senha){ 
             if($senha != $confirmar_senha){
                 header('location:./../view/admin/principal/adicionar_usuario.php?erro=erroIgualdade');
             } else if(strlen($senha) < 8){
                header('location:./../view/admin/principal/adicionar_usuario.php?erro=erroTamanho');
             } else if(ctype_alpha($senha) == true){
                header('location:./../view/admin/principal/adicionar_usuario.php?erro=erroQtdLetra');
             } else if(ctype_alpha($senha) == false){
                header('location:./../view/admin/principal/adicionar_usuario.php?erro=erroQtdNumero');
             }
             else{     
                 $this->model->adicionarUsuario($email, $senha, $perfil);
                 header('location:./../view\admin\principal');
             }
        }

        // public function validar ($senha, $confirmar_senha){
        //     $this->model->validarUsuario($senha, $confirmar_senha);
        // }
    }

    $ctrlUsuario = new ControllerUsuario();
    $ctrlUsuario->adicionar($email, $senha, $perfil, $confirmar_senha);
    // $ctrlUsuario->validar($senha,$confirmar_senha);
?>