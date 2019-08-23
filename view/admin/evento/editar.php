<?php 
$titulo = "Registrar evento";
$categoria = "Eventos";
$local = "Registrar evento";
$id = $_GET['id'];
require_once("../base/header.php");
require_once "./../../../controller/editar_evento.php";

$lista = $ctrlEvento->nome($id);

?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Novo evento
			</div>
			<div class="card-body">
				<form action="./../../../controller/atualizar_evento.php" method="POST">
				<input type="hidden" value=<?php echo $id; ?> name = 'id'>
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" id="titulo" name="titulo" value=<?php echo $lista['nome']; ?> required>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="ano">Ano</label>
							<input type="number" value=<?php echo $lista['ano']; ?> class="form-control" id="ano" name="ano">
						</div>
						<div class="col">
							<label for="semestre">Semestre</label>
							<select class="form-control" id="semestre" name="semestre">
								<?php if($lista['semestre'] == 'Primeiro semestre'){ ?>
									<option selected>Primeiro semestre</option>
									<option>Segundo semestre</option>
								<?php }else{ ?>
									<option>Primeiro semestre</option>
									<option selected>Segundo semestre</option>
								<?php } ?>
						</select>
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
				<p>Você deverá preencher todos os campos para registrar o seu evento.</p>
				<ul>
					<li><strong>Título</strong>: escreva o nome que você deseja dar ao seu evento.</li>
					<li><strong>Ano</strong>: selecione o ano que o evento será realizado.</li>
					<li><strong>Semestre</strong>: selecione, dentre as opções, o semestre que o evento será realizado.</li>
				</ul>
				<p>Após conferir todos os campos, clique no botão <strong>Salvar</strong>.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>