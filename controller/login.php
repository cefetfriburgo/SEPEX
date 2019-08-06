<?php
include '/../model/login.php';

class Controller {
	
    public function login() {
		
		/* Pega o usuário e senha preenchidos no formulário de login da View */
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		/* Encaminha os dados a Model para que seja realizado a validação */
		$model = new Model();
		$validacao = $model->validaDados($email,$senha);
		
		/* Pega o resultado da validação realizada no Model e o encaminha para ser exibido pela View */
		$view = new View();
		$view->login($validacao); 
       
    }
}

?>