<DOCTYPE html>
<html>
	<head>
		<title> Confirmar e-mail</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Clique aqui para baixar</h1>
		<?php
			$chave = $_GET['chave'];
			
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$dbname = "funil";
			//Criar a conexao
			$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
			
			$result_links_emaos = "UPDATE links_emaos SET situacao = '2' WHERE link = '$chave'";
			$resultado_links_emaos = mysqli_query($conn, $result_links_emaos);
			
			
		?>
	</body>	
</html>

