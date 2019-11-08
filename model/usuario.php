<?php
require_once dirname(__FILE__)."./../conexao.php";

	class Model{

		private $pdo = null;
		
		public function __construct(){
			$this->pdo = Conexao::conectar();
		}
  
	    public function validaDados($email, $senha, $nova_senha, $confirmar_nova_senha) {

				$pass = sha1($senha); //deve receber a variavel $senha com a criptografia
				$ps = $this->pdo->query("SELECT acesso, senha FROM usuario WHERE email='" . $email . "'");
	    	
				$p = $ps->fetch();
				
				$ver = $p['senha'];

			
				if($pass != $ver){
					
					header('location:./../view/admin/principal/usuario.php?erro=senhaAtual');//return 'email ou senha incorretos';
 
				}else if($nova_senha != $confirmar_nova_senha){
					header('location:./../view/admin/principal/usuario.php?erro=senhaNova');
				}else{
					

					$nova = sha1($nova_senha);
					$alteracao = $this->pdo->query("UPDATE usuario SET senha='$nova' where email='$email'");

					
					header('location:./../view/admin/principal/index.php');	
				}
				
		}

		public function adicionarUsuario($email, $senha, $perfil){
                $pd = $this->pdo->prepare("INSERT INTO usuario(email, senha, acesso) VALUES(?, SHA1(?), ?)");
                $pd->execute(array($email, $senha, $perfil));          
        }

	
	}

?>