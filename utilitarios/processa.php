<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php	
			$email = $_POST['email'];
			
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$dbname = "funil";
			
			//Criar a conexao
			$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
			
			$result_leados = "INSERT INTO leados (email) VALUES ('$email')";
			$resultado_leados = mysqli_query($conn, $result_leados);
			
			$leado_id = mysqli_insert_id($conn);
			
			$valor_chave = md5(date('Y-m-d H:i'));
			
			$link = "http://localhost/Aula/baixar.php?chave=".$valor_chave;
			
			$result_links_emaos = "INSERT INTO links_emaos (link, leado_id) VALUES ('$valor_chave', '$leado_id')";
			$resultado_links_emaos = mysqli_query($conn, $result_links_emaos);
			
			//Inicio Enviar e-mail
			require 'PHPMailer/PHPMailerAutoload.php';
	
			$Mailer = new PHPMailer();
			
			//Define que será usado SMTP
			$Mailer->IsSMTP();
			
			//Enviar e-mail em HTML
			$Mailer->isHTML(true);
			
			//Aceitar carasteres especiais
			$Mailer->Charset = 'UTF-8';
			
			//Configurações
			$Mailer->SMTPAuth = true;
			$Mailer->SMTPSecure = 'ssl';
			
			//nome do servidor
			$Mailer->Host = 'smtp.gmail.com';
			//Porta de saida de e-mail 
			$Mailer->Port = 465;
			
			//Dados do e-mail de saida - autenticação
			$Mailer->Username = 'testesepex@gmail.com';
			$Mailer->Password = 'sepex123';
			
			//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
			$Mailer->From = 'testesepex@gmail.com';
			
			//Nome do Remetente
			$Mailer->FromName = 'SEPEX';
			
			//Assunto da mensagem
			$Mailer->Subject = 'Confirme seu endereço de e-mail';
			
			//Corpo da Mensagem
			$mensagem = "Olá <br><br>";
			$mensagem .= "Confirme seu e-mail para receber o material! <br> <br>";
			$mensagem .= "<a href=".$link.">Clique aqui para confirmar seu e-mail</a><br> <br>";
			$mensagem .= "Se você recebeu este e-mail por engano, simplesmente o exclua.<br> <br>";
			$mensagem .= "CEFET/RJ Campus Nova Friburgo";
			
			$Mailer->Body = $mensagem;
			
			//Corpo da mensagem em texto
			$Mailer->AltBody = 'conteudo do E-mail em texto';
			
			//Destinatario 
			$Mailer->AddAddress($email);
			
			if($Mailer->Send()){
				echo "E-mail enviado com sucesso";
			}else{
				echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
			}
			
			//Fim Enviar e-mail

			
			if(mysqli_affected_rows($conn) != 0){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/SEPEX/utilitarios/confirmacao.php'>
					<script type=\"text/javascript\">
						alert(\"E-mail recebido com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/confirmacao.php'>
					<script type=\"text/javascript\">
						alert(\"Falha no cadastro do e-mail.\");
					</script>
				";	
			}?>
			
		?>
	</body>
</html>