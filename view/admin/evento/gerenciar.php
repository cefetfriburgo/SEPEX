<?php 
$titulo = "Gerenciar evento";
$categoria = "Eventos";
$local = "Gerenciar evento";
include_once("../base/header.php"); ?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Publicar evento
			</div>
			<div class="card-body">

				<p>O evento <strong><?= "SEPEX 2019" ?></strong> está atualmente selecionado como publicado. Para ver mais detalhes sobre este evento, <a href="./editar.php?id=<?= "Imprimir aqui o código do evento" ?>">clique aqui</a>.</p>

				<form action="./../../../controller/adicionar_evento.php" method="POST">
					<div class="form-group">
						<label for="titulo">Selecionar evento</label>
						<select class="form-control" id="semestre" name="semestre">
							<option value="Primeiro semestre">Semana de Extensão</option>
						</select>
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
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>