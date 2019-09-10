<?php

	class Model{
  
	    public function validaDados($email, $senha) {
			$pdo = new PDO('mysql:host=localhost;dbname=sepex;charset=utf8', 'root', '');
				
				$array = explode('@', $email);			

				$pass = sha1($senha); //deve receber a variavel $senha com a criptografia
				$ps = $pdo->query("SELECT senha FROM usuario WHERE email='" . $email . "'");
	    	
				$p = $ps->fetch();
				
				$ver = $p['senha'];

			/* Aplica a validação ao usuário e senha passados, utilizando as regras de négocio especificas para ele. */
			
				if(substr($array[1], -11) !="cefet-rj.br"){// verifica os ultimos 11
					
					header('location:./../view/admin/login.php?erro=erro');//	return 'Digite o usuário corretamente';
					
				}else if($pass != $ver){
					
					header('location:./../view/admin/login.php?erro=erro');//return 'email ou senha incorretos';

				}else{
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['senha'] = $senha;
					
					header('location:./../view/admin/principal/index.php');	
				}
				
		}
	
	}

?>