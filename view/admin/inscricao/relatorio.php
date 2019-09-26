<?php 
$titulo = "Relatório de Inscrição";
$categoria = "Inscrições";
$local = "Relatório de Inscrição";
include_once("../base/header.php"); 
require_once('../../../controller/gerenciar_inscricao.php');

if(isset($_GET['id']) && !empty($_GET['id'])){ 
	$id = $_GET['id'];

	$participante = $c->listar($id); 
	$atividade = $c->inicio($id); ?>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Relatório
			</div>
			<div class="card-body">
				<h2><?= "Atividade de Extensão 1"; ?></h2>
				<p class="float-left">Esta atividade inicia-se em <strong><?= $atividade['data']; ?> às <?= $atividade['hora_inicio']; ?></strong>.</p>
				<p class="float-right"><a href="adicionar.php?id=<?= 1; ?>">Registrar participante</a></p>
				<form>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Nome</th>
								<th scope="col">Endereço de e-mail</th>
								<th scope="col">CPF</th>
								<th scope="col">Data de registro</th>
								<th scope="col">Presente</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($participante as $prt){ ?>
							<tr>
								<td><?= $prt['nome_inscrito']; ?></td>
								<td><?= $prt['email']; ?></td>
								<td><?= $prt['cpf']; ?></td>
								<td><?= $prt['data_inscricao'];?></td>
								<td class="float-right">
									<input type="checkbox" class="form-check-input" id="presente" value="<?= 1; ?>">
								</td>
							</tr>
							<?php } ?>
							<!-- <tr>
								<td>Leonardo Pinto Guilherme</td>
								<td>leozinho.guilherme@aluno.cefet-rj.br</td>
								<td>01234567890</td>
								<td>12-12-2012 08:25:33</td>
								<td class="float-right">
									<input type="checkbox" class="form-check-input" id="presente" value="<?= 1; ?>">
								</td>
							</tr>
							<tr>
								<td>Leonardo Pinto Guilherme</td>
								<td>leozinho.guilherme@aluno.cefet-rj.br</td>
								<td>01234567890</td>
								<td>12-12-2012 08:25:33</td>
								<td class="float-right">
									<input type="checkbox" class="form-check-input" id="presente" value="<?= 1; ?>">
								</td>
							</tr> -->
					</tbody>
				</table>
				<button class="btn btn-primary btn-block col-2 float-right" type="submit">Salvar alterações</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php }else{
			header('location: ./gerenciar.php');
		}
	 include_once("../base/footer.php"); ?>