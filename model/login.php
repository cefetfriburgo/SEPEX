<?php
	class Model{
  
	    public function validaDados($email, $senha) {
			$pdo = new PDO('mysql:host=localhost;dbname=sepex', 'root', '');

			$pos = strpos($email, '@');
			//echo $pos;
			if($pos!= null){
				$array = explode('@', $email);
			
			

				$pass = md5($senha); //deve receber a variavel $senha com a criptografia
				$ps = $pdo->query("select senha from administrador where email='" . $email . "'");
	    	//$ps->execute();
				$p = $ps->fetchAll();
				//foreach($ps as $ps)
				$ver = $p[0]['senha'];

 		   	/*foreach($p as $id => $valor){
			        echo $valor[$id];
		    }*/

			//echo $ver;
			/* Aplica a validação ao usuário e senha passados, utilizando as regras de négocio especificas para ele. */
			
				if($array[1]!="cefet-rj.br"){
						return 'Digite o usuário corretamente';
				}else if($pass != $ver){

					return 'senha incorreta';

				}else{

					return 'Login efetuado com sucesso';			
				}
			}else{
				return "digite corretamente";
			}
				
		}
	
	}

	$c = new Model();
	echo $c->validaDados('pedro@cefet-rj.br', 'pedro');

?>