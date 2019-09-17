<?php
require_once dirname(__FILE__)."./../conexao.php";

	class Model{
  
	    public function validaDados($email, $senha, $nova_senha, $confirmar_nova_senha) {
			$pdo = Conexao::conectar();//new PDO('mysql:host=localhost;dbname=sepex;charset=utf8', 'root', '');	

				$pass = sha1($senha); //deve receber a variavel $senha com a criptografia
				$ps = $pdo->query("SELECT senha FROM usuario WHERE email='" . $email . "'");
	    	
				$p = $ps->fetch();
				
				$ver = $p['senha'];

			
				if($pass != $ver){
					
					header('location:./../view/admin/principal/usuario.php?erro=senhaAtual');//return 'email ou senha incorretos';
 
				}else if($nova_senha != $confirmar_nova_senha){
					header('location:./../view/admin/principal/usuario.php?erro=senhaNova');
				}else{
					// session_start();
					// $_SESSION['email'] = $email;
					// $_SESSION['senha'] = $senha;

					$nova = sha1($nova_senha);
					$alteracao = $pdo->query("UPDATE usuario SET senha='$nova' where email='$email'");

					
					header('location:./../view/admin/principal/index.php');	
				}
				
		}
	
	}

?>