<?php 
$titulo = "Registrar atividade";
$categoria = "Atividades";
$local = "Registrar atividade";
require_once("../base/header.php"); 
require_once("../../../model/atividade.php"); ?>

<script >

    $d = document;
    id = 1;
    // function adicionar(){
    //     bloco = $d.getElementById('bloco');
    //     input = $d.createElement('input');

    //     input.type = 'text';
    //     input.name = 'nome' + id;
    //     input.id = 'nome' + id;
    //     input.classList.add('form-control');

    //     bloco.append('Nome do colaborador');
    //     bloco.append(input);
    //     id++;        
    // }

	function cadastrado(){
        bloco = $d.getElementById('bloco');
		e = $d.getElementById('colaborador');
		nome = e.selectedOptions[0].text;
        input = $d.createElement('input');
		select = $d.createElement('select');

        input.type = 'text';
        input.name = 'colaborador' + id;
        input.id = 'colaborador' + id;
        input.classList.add('form-control');
		input.value = nome;

		select.id="papel" + id;
		select.name ="papel" + id;		
		select.classList.add('form-control');

		select.innerHTML = "<option disabled selected>Evento para esta atividade</option><?php $c = new Atividade(); $lista = $c->listarPapel(); foreach($lista as $l){ ?><option value = <?php echo $l['papel_id']; ?> ><?php echo $l['papel']; ?></option><?php } ?>";							
		

        bloco.append('Nome do colaborador');
        bloco.append(input);
		bloco.append(select);
        id++;        
    }

</script>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Nova atividade
			</div>
			<div class="card-body">
				<form action="./../../../controller/adicionar_atividade.php" method="POST">
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da atividade" required>
					</div>
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="data">Data</label>
							<input type="date" class="form-control" id="data" name="data">
						</div>
						<div class="col">
							<label for="hora_inicio">Hora de início</label>
							<input type="time" class="form-control" id="hora_inicio" name="hora_inicio">
						</div>
						<div class="col">
							<label for="hora_termino">Hora de término</label>
							<input type="time" class="form-control" id="hora_termino" name="hora_termino">
						</div>
					</div>
					<div class="form-group">
						<label for="evento">Evento</label>
						<select class="form-control" id="evento" name="evento">
							<option disabled selected>Evento para esta atividade</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarEvento();
								foreach($lista as $l){
							?>
									<option value = <?php echo $l['idEvento']; ?> ><?php echo $l['nome']; ?></option>
								<?php } ?>
							
						</select>
					</div>
					<div class="form-group">
						<label for="tipo">Tipo de Atividade</label>
						<select class="form-control" id="tipo" name="tipo">
							<option disabled selected>Tipo para esta atividade</option>
							<?php 
							$c = new Atividade();
							$lista = $c->listarTipoAtividade();
							foreach($lista as $l){ ?>
							<option value = <?php echo $l['idTipoAtividade'];?> ><?php echo $l['tipoAtividade']; ?></option>
							<?php } ?>
						</select>
						<label for='capacidade'>Vagas</label>
						<input type="number" min='0' class="form-control" id="capacidade" name="capacidade">
					</div>
					<div class="form-group">
						<div id='bloco' class='form-group'>
						</div>
						<label for="colaborador">Colaboradores</label>
                        <select class="form-control" id="colaborador" name="colaborador">
							<option disabled selected>colaboradores já cadastrados</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarColaborador();
								foreach($lista as $l){
							?>
									<option id='cadastrado' name=<?php echo $l['nome']; ?> value = <?php echo $l['colaborador_id']; ?> ><?php echo $l['nome']; ?></option>
								<?php } ?>							
						</select>
						<input class="btn btn-primary btn-block" type="button" value='Incluir' onclick='cadastrado()'>
					</div>
					<div class='form-group'>
						<a href='./colaborador.php'>
							<input type='button' value='Cadastrar colaborador' id='colaborador' name='colaborador'/>
						</a>
					</div>
					<!-- <div id='vagas' class="form-group">
						<label for="ncolaborador">Número de colaboradores</label>
						<input type="number" min='0' class="form-control" id="ncolaborador" name="ncolaborador">
						<input type='button' value='OK' class="btn btn-primary btn-block" onclick='adicionar()'/>
					</div> -->
					<div class="form-group">
						<label for="etiqueta">Palavras-chave</label>
						<input type="text" class="form-control" id="etiqueta" name="etiqueta" placeholder="Palavras-chave da atividade" required>
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