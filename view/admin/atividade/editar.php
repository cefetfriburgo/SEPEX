<?php 
$id = $_GET['id'];

if(!isset($id) || $id==null){
	header('location: ./listar.php');
}
$titulo = "Editar atividade";
$categoria = "Atividades";
$local = "Editar atividade";

require_once("../base/header.php"); 
require_once("./../../../controller/editar_atividade.php"); 


$lista = $ctrlAtividade->nome($id);
$capacidade = $lista['capacidade'];
$etiqueta = $lista['etiqueta'];
$idEvento = $lista['evento_id'];
$ida = $lista['tipo_atividade_id'];


?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Nova atividade
			</div>
			<div class="card-body">
				<form action="./../../../controller/atualizar_atividade.php" method="POST">
				<input type="hidden" value='<?php echo $id; ?>' id='id' name='id'>
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" value='<?php echo $lista['nome_atividade'];?>' id="titulo" name="titulo" placeholder="Título da atividade" required>
					</div>
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea class="form-control"  id="descricao" name="descricao" rows="3"><?php echo $lista['descricao'];?></textarea>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="data">Data</label>
							<input type="date" class="form-control" value='<?php echo $lista['data'];?>' id="data" name="data">
						</div>
						<div class="col">
							<label for="hora_inicio">Hora de início</label>
							<input type="time" class="form-control" value='<?php echo $lista['hora_inicio'];?>' id="hora_inicio" name="hora_inicio">
						</div>
						<div class="col">
							<label for="hora_fim">Hora de término</label>
							<input type="time" class="form-control" value='<?php echo $lista['hora_fim'];?>' id="hora_fim" name="hora_fim">
						</div>
					</div>
					<div class="form-group">
						<label for="evento">Evento</label>
						<select class="form-control" id="evento" name="evento" required>
							<option disabled >Evento para esta atividade</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarEvento();
								foreach($lista as $l){
									if($idEvento == $l['idEvento']){

							?>		<option value = <?php echo $l['evento_id']; ?> selected ><?php echo $l['nome_evento']; ?></option>
							<?php }else{ ?>
									<option value = <?php echo $l['evento_id']; ?> ><?php echo $l['nome_evento']; ?></option>
								<?php } }?>
							
						</select>
					</div>
					<div class="form-group">
						<label for="tipo">Tipo de Atividade</label>
						<select class="form-control" id="tipo" name="tipo">
							<option disabled selected>Tipo para esta atividade</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarTipoAtividade();
								foreach($lista as $l){
									if($ida == $l['tipo_atividade_id']){
							 ?>
							<option value = <?php echo $l['tipo_atividade_id'];?> selected><?php echo $l['nome_tipo_atividade']; ?></option>
									<?php }else{ ?>				
							<option value = <?php echo $l['tipo_atividade_id'];?> ><?php echo $l['nome_tipo_atividade']; ?></option>
							
							<?php } } ?>
						</select>
					</div>
					<div class="form-group">
						<label for='capacidade'>Vagas</label>
						<input type="number" min='0' class="form-control" id="capacidade" name="capacidade" value='<?php echo $capacidade;?>'>
					</div>
					<!-- <div id='vagas' class="form-group">
						<label for="ncolaborador">Número de colaboradores</label>
						<input type="number" min='0' class="form-control" id="ncolaborador" name="ncolaborador">
						<input type='button' value='OK' class="btn btn-primary btn-block" onclick='adicionar()'/><br>
					</div> -->
					<div class="form-group">
						<label for="etiqueta">Palavras-chave</label>
						<input type="text" class="form-control" value='<?php echo $etiqueta;?>' id="etiqueta" name="etiqueta" placeholder="Palavras-chave da atividade">
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
				<p>Para preencher corretamente os campos, siga as instruções</p>
				<ul>
					<li><strong>Título</strong>: escreva o nome que você deseja dar para a atividade.</li>
					<li><strong>Descrição</strong>: escreva um texto para a atividade. Este campo é opcional.</li>
					<li><strong>Data e horas</strong>: selecione a data de início, incluindo o dia, mês e ano e as horas de início e término da atividade, incluindo os minutos.</li>
					<li><strong>Evento</strong>: selecione dentre a lista o evento no qual esta atividade associada. Se você ainda não registrou o evento, faça-o <a href="#">aqui</a>.</li>
					<li><strong>Tipo</strong>: selecione dentre a lista de opções o tipo desta atividade.</li>
					<li><strong>Palavras-chave</strong>: escreva, separado por vírgulas, as palavras-chave que correspondem a esta atividade.</li>
				</ul>
				<p>Após conferir todos os campos, clique no botão <strong>Salvar</strong>.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>