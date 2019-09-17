<?php
	include './../model/usuario.php';

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$nova_senha = $_POST['nova-senha'];
	$confirmar_nova_senha = $_POST['confirmar-nova-senha'];

	class Controller{
	
    	public function verificarSenha($email, $senha, $nova_senha, $confirmar_nova_senha) {

    		$model = new Model();
			$validacao = $model->validaDados($email,$senha, $nova_senha, $confirmar_nova_senha);
			echo $validacao;

    	}
    }

    $controller = new Controller();
	$controller->verificarSenha($email, $senha, $nova_senha, $confirmar_nova_senha);
?>