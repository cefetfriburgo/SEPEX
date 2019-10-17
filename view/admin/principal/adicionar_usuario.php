<?php 
$titulo = "Configurações";
$categoria = "Usuário";
$local = "Configurações";
include_once("../base/header.php");
if($_SESSION['acesso'] == 'Administrador'){ 

		if(isset($_GET['erro'])){
			if($_GET['erro'] == 'erroIgualdade'){
				echo "<script> alert('As senhas são diferentes!'); </script>";
			} else if($_GET['erro'] == 'erroTamanho'){
				echo "<script> alert('A senha deve conter no mínimo 8 caracteres!'); </script>";
			} else if($_GET['erro'] == 'erroQtdLetra'){
				echo "<script> alert('A senha deve conter números!'); </script>";
			} else if($_GET['erro'] == 'erroQtdNumero'){
				echo "<script> alert('A senha deve conter letras!'); </script>";
			}
		}

	?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Criar novo usuário
			</div>
			<div class="card-body">
				<form action="./../../../controller/adicionar_usuario.php" method="POST">
					<div class="form-group form-row">
						<div class="col-md-6">
							<label for="email">Endereço de e-mail</label>
							<input type="text" class="form-control" id="email" name="email"/>						
						</div>
						<div class="col-md-6">
							<label for="email">Privilégio do perfil</label>
							<select class="form-control" id="perfil" name="perfil" />
								<option value="Administrador">Administrador</option>
								<option value="Usuário">Usuário</option>
								<option value="Colaborador">Colaborador</option>
							</select>
						</div>
					</div>
					<div class="form-group form-row">
						<div class="col-md-6">
							<label for="senha">Senha</label>
							<input type="password" class="form-control" id="senha" name="senha" />
						</div>
						<div class="col-md-6">
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

<?php } else{
  header("Location: ./../principal/index.php");
}

include_once("../base/footer.php"); ?>