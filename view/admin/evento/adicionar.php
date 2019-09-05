<?php 
$titulo = "Registrar evento";
$categoria = "Eventos";
$local = "Registrar evento";
include_once("../base/header.php"); ?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Novo evento
			</div>
			<div class="card-body">
				<form action="./../../../controller/adicionar_evento.php" method="POST">
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do evento" required>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="ano">Ano</label>
							<input type="number" value="2019" class="form-control" id="ano" name="ano">
						</div>
						<div class="col">
							<label for="semestre">Semestre</label>
							<select class="form-control" id="semestre" name="semestre">
								<option value="Primeiro semestre">Primeiro semestre</option>
								<option value="Segundo semestre">Segundo semestre</option>
						</select>
						</div>
					</div>
					<div class='form-group form-row'>
						<div class='col'>
							<label for='data_inicio'>Data de Início</label>
							<input type='date' class='form-control' id='data_inicio' name='data_inicio'/>
						</div>
						<div class='col'>
							<label for='hora_inicio'>Hora de Início</label>
							<input type='time' class='form-control' id='hora_inicio' name='hora_inicio'/>
						</div>
						<div class='col'>
							<label for='data_fim'>Data Final</label>
							<input type='date' class='form-control' id='data_fim' name='data_fim'/>
						</div>
						<div class='col'>
							<label for='hora_fim'>Hora Final</label>
							<input type='time' class='form-control' id='hora_fim' name='hora_fim'/>
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
					<li><strong>Data e hora de início</strong>: selecione a data e hora que o evento será iniciado.</li>
					<li><strong>Data e hora de término</strong>: selecione a data e hora que o evento será encerrado.</li>
				</ul>
				<p>Após conferir todos os campos, clique no botão <strong>Salvar</strong>.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>