<?php 
$titulo = "Registrar atividade";
$categoria = "Atividades";
$local = "Registrar atividade";
require_once("../base/header.php"); 
require_once("../../../model/atividade.php"); 
if( isset($_GET['erro']) ){
	$erro = $_GET['erro'];
	echo "<script>alert(" . $erro . ");</script>";
}
?>


<script >

    $d = document;
    id = 1;
  

	function cadastrado(){
		let conteudo = $d.getElementById('conteudo');
        bloco = $d.getElementById('bloco');
		e = $d.getElementById('colaborador');
		nome = e.selectedOptions[0].text;
		val = e.selectedOptions[0].value;

		if(nome == 'Colaboradores já cadastrados'){}
		else{
			input = $d.createElement('input');
			input2 = $d.createElement('input');
			input3 = $d.createElement('input');

			
			select = $d.createElement('select');

			input.type = 'text';
			input.name = 'colaborador' + id;
			input.id = 'colaborador' + id;
			input.classList.add('form-control');
			input.disabled = 'disabled';
			input.value = nome;

			input2.type = 'hidden';
			input2.name = 'hide2';
			input2.id = 'hide2';
			input2.value = id;

			input3.type = 'hidden';
			input3.name = 'oculto'+id;
			input3.id = 'oculto'+id;
			input3.value = val;

			select.id="papel" + id;
			select.name ="papel" + id;		
			select.classList.add('form-control');

			select.innerHTML = "<option selected value='xxx'>Função para esta atividade</option><?php $c = new Atividade(); $lista = $c->listarPapel(); foreach($lista as $l){ ?><option value = <?php echo $l['papel_id']; ?> ><?php echo $l['papel']; ?></option><?php } ?>";							
			

			bloco.append('Nome do colaborador');
			bloco.append(input);
			bloco.append(input2);
			bloco.append(input3);
			bloco.append(select);
			id++;  
		}      
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
					<div id="conteudo">
						
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="button" value="Nova data" id='adicionar_data' onclick='adicionar()'>
					</div>
					<div class="form-group">
						<label for="local">Local</label>
						<input type="text" class="form-control" id="local" name="local" placeholder="Local da atividade" required>
					</div>
					<div class="form-group">
						<label for="evento">Evento</label>
						<select class="form-control" id="evento" name="evento">
							<option value='xxx' selected>Evento para esta atividade</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarEvento();
								foreach($lista as $l){
							?>
									<option value = <?php echo $l['evento_id']; ?> ><?php echo $l['nome_evento']; ?></option>
								<?php } ?>
							
						</select>
					</div>
					<div class="form-group">
						<label for="tipo">Tipo de Atividade</label>
						<select class="form-control" id="tipo" name="tipo">
							<option value='xxx' selected>Tipo para esta atividade</option>
							<?php 
							$c = new Atividade();
							$lista = $c->listarTipoAtividade();
							foreach($lista as $l){ ?>
							<option value = <?php echo $l['tipo_atividade_id'];?> ><?php echo $l['nome_tipo_atividade']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="capacidade">Vagas</label>
						<input type="number" min="0" max="200" class="form-control" id="capacidade" name="capacidade">
					</div>
					<div class="form-group">
						<div id="conteudo"></div>
						<div id='bloco' class='form-group'>
						</div>
						<label for="colaborador">Colaboradores</label>
                        <select class="form-control" id="colaborador" >
							<option disabled selected>Colaboradores já cadastrados</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarColaborador();
								foreach($lista as $l){
							?>
							<option id='cadastrado' name=<?php echo $l['nome_colaborador']; ?> value = <?php echo $l['colaborador_id']; ?> ><?php echo $l['nome_colaborador']; ?></option>
							<?php } ?>							
						</select>
						<input class="btn btn-primary btn-block" type="button" value='Incluir' onclick='cadastrado()'>
					</div>
					<div class='form-group'>
						<a href='./colaborador.php'>
							<input type='button' value='Cadastrar colaborador' id='colaborador' name='colaborador'/>
						</a>
					</div>
					<div class="form-group">
						<label for="etiqueta">Palavras-chave</label>
						<input type="text" class="form-control" id="etiqueta" name="etiqueta" placeholder="Palavras-chave da atividade">
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
					<li><strong>Vagas</strong>: escreva o número para definir a quantidade máxima de pessoas inscritas para esta atividade.</li>
					<li><strong>Palavras-chave</strong>: escreva, separado por vírgulas, as palavras-chave que correspondem a esta atividade.</li>
				</ul>
				<p>Após conferir todos os campos, clique no botão <strong>Salvar</strong>.</p>
			</div>
		</div>
	</div>
</div>

<script src='./../../../public/js/adicionar_atividade.js' ></script>

<?php include_once("../base/footer.php"); ?>