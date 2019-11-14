<DOCTYPE html>
<html>
	<head>
		<title>Confirmação</title>
		<meta charset="utf-8">
		<script type="text/javascript">
			function abrir(){
				document.getElementById('popup').style.display = 'block';
			}
			function fechar(){
				document.getElementById('popup').style.display =  'none';
			}
			function duracao(){
				document.getElementById('popup').style.display =  'none';
				setTimeout ("abrir()", 1000);
			}
		</script>
	</head>
	<body onload="javascript:duracao()">
		<div id="popup" class="popup">
			<h2>Confirmar e-mail</h2>	
			<form method="POST" action="processa.php">
				<p><input type="email" name="email" placeholder="Seu melhor e-mail" required>
				<p><input type="submit" value="Receber">
			</form>
		</div>
	</body>	
</html>