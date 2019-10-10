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
				<h2><?= $atividade['nome_atividade']; ?></h2>
				<p class="float-left">Esta atividade inicia-se em <strong><?= $atividade['data']; ?> às <?= $atividade['hora_inicio']; ?></strong>.</p>
				<p class="float-right"><a href="adicionar.php?id=<?= $id; ?>">Registrar participante</a></p>
				<form action="../../../view/admin/inscricao/formulario.php" method="POST">
					<input type="hidden" id="atividade" name="atividade" value="<?php echo $id; ?>">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Nome</th>
								<th scope="col">Endereço de e-mail</th>
								<?php if($_SESSION['acesso'] == 'Administrador'){ ?><th scope="col">CPF</th><?php } ?>
								<th scope="col">Data de registro</th>
								<th scope="col">Presente</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$array_id = [];
								$i = 0;
								//$array_presenca = [];
								foreach($participante as $prt){ ?>
									<!-- <input type="hidden" id="participante" name="participante" value="<?php echo $prt['inscricao_id']; ?>"> -->
									<tr>
										<td><?= $prt['nome_inscrito']; ?></td>
										<td><?= $prt['email']; ?></td>
										<?php if($_SESSION['acesso'] == 'Administrador'){ ?> <td><?= $prt['cpf']; ?></td><?php } ?>
										<td><?= $prt['data_inscricao'];?></td>
										<td class="float-right">
									<input type="checkbox" class="form-check-input" name="presenca[<?php echo $i;?>]" id="presenca" <?php if($prt['presente']){
												echo "checked";	
											} 
											?>>				
										</td>
									</tr>
									<input type="hidden" name="participantes[<?php echo $i;?>]" value="<?php echo $prt['inscricao_id']; ?>">
							<?php 
							$i++;
								// array_push($array_id, $prt['inscricao_id']);
								// $vetor_id = implode(",", $array_id);
								// array_push($array_presenca, $prt['presente']);
								// $vetor_presenca = implode(",", $array_presenca);
							} ?>
							
<!-- 							<input type="hidden" name="participantes" value="<?php echo $vetor_presenca; ?>">-->							
							<!-- <tr>
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