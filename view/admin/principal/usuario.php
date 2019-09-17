<?php 
$titulo = "Configurações";
$categoria = "Usuário";
$local = "Configurações";
include_once("../base/header.php"); 


    if(isset($_GET['erro'])){
      if($_GET['erro']=='senhaAtual'){
        echo "<script> alert('Senha atual incorreta!'); </script>";
      }else if($_GET['erro']=='senhaNova'){
      	echo "<script> alert('As senhas são diferentes!'); </script>";
      }
    } 
$email = $_SESSION['email'];
?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Configurações de usuário
			</div>
			<div class="card-body">

				<form action="./../../../controller/usuario.php" method="POST">
					<div class="form-group">
						<label for="email">Endereço de e-mail</label>
						<input type="text" class="form-control" id="email0" name="email0" value="<?php echo $email; ?>" disabled/>
						<input type='hidden' id="email" name="email" value="<?php echo $email; ?>"/>
					</div>
					<div class="form-group">
						<label for="senha">Senha atual</label>
						<input type="password" class="form-control" id="senha" name="senha" />
					</div>
					<div class='form-group form-row'>
						<div class='col'>
							<label for="nova-senha">Nova senha</label>
							<input type='password' class='form-control' id='nova-senha' name='nova-senha'required/>
						</div>
						<div class='col'>
							<label for="confirmar-nova-senha">Confirmar nova senha</label>
							<input type="password" class="form-control" id="confirmar-nova-senha" name="confirmar-nova-senha" required />
						</div>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Salvar</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-info"></i> Guia de ajuda
			</div>
			<div class="card-body">
				<p>O sistema permite apenas a publicação de um evento por vez. Selecione no campo ao lado o evento o qual você deseja publicá-lo no site.</p>
				<p>Este sistema apenas permite o registro de endereço de e-mail institucional e por isso não pode ser alterado.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>