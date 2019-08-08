<?php
include './../model/login.php';

$email = $_POST['email'];
$senha = $_POST['senha'];


class Controller{
	
    public function login($email, $senha) {
		
		/* Pega o usuário e senha preenchidos no formulário de login da View */	
		
		
		/* Encaminha os dados a Model para que seja realizado a validação */
		$model = new Model();
		$validacao = $model->validaDados($email,$senha);
		echo $validacao;
		
		/* Pega o resultado da validação realizada no Model e o encaminha para ser exibido pela View */
		//$view = new View();
		//$view->login($validacao); 
       
    }
}

$controller = new Controller();
$controller->login($email, $senha);

?>