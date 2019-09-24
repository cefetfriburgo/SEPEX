<?php 
$titulo = "Relatório de Inscrição";
$categoria = "Inscrições";
$local = "Relatório de Inscrição";
include_once("../base/header.php"); ?>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Relatório
			</div>
			<div class="card-body">
				<h2><?= "Atividade de Extensão 1"; ?></h2>
				<p class="float-left">Esta atividade inicia-se em <strong><?= "20-08-2019"; ?> às <?= "08:30" ?></strong>.</p>
				<p class="float-right"><a href="">Registrar participante</a></p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">E-mail</th>
							<th scope="col">CPF</th>
							<th scope="col">Data de registro</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Leonardo Pinto Guilherme</td>
							<td>leozinho.guilherme@aluno.cefet-rj.br</td>
							<td>01234567890</td>
							<td>12-12-2012 08:25:33</td>
						</tr>
						<tr>
							<td>Leonardo Pinto Guilherme</td>
							<td>leozinho.guilherme@aluno.cefet-rj.br</td>
							<td>01234567890</td>
							<td>12-12-2012 08:25:33</td>
						</tr>
						<tr>
							<td>Leonardo Pinto Guilherme</td>
							<td>leozinho.guilherme@aluno.cefet-rj.br</td>
							<td>01234567890</td>
							<td>12-12-2012 08:25:33</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>