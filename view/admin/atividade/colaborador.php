<?php
    $titulo = "Registrar colaborador";
    $categoria = "Atividades";
    $local = "Registrar colaborador";
    require_once("../base/header.php"); 
    require_once("../../../model/atividade.php"); 
?>
<script >

    $d = document;
    id = 1;
    function adicionar(){
        bloco = $d.getElementById('bloco');
        input = $d.createElement('input');

        input.type = 'text';
        input.name = 'nome' + id;
        input.id = 'nome' + id;
        input.classList.add('form-control');

        bloco.append('Nome do colaborador');
        bloco.append(input);
        id++;
        
    }

</script>
<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Novo colaborador
			</div>
			<div class="card-body">               
				<form action="./../../../controller/adicionar_colaborador.php" method="POST">
                    <div id='bloco' class = "form-group">
					    <label for="titulo">Nome</label>
					    <input type='button' class=" form-control btn btn-primary btn-block" onclick='adicionar()'value='Adicionar colaborador'>
				    </div>                    
					<div class="form-group">
						<label for="evento">Colaboradores</label>
                        <select class="form-control" id="colaborador" name="colaborador">
							<option disabled selected>colaboradores já cadastrados</option>
							<?php 
								$c = new Atividade();
								$lista = $c->listarColaborador();
								foreach($lista as $l){
							?>
									<option value = <?php echo $l['idColaborador']; ?> ><?php echo $l['nome']; ?></option>
								<?php } ?>							
						</select>
					</div>
					<!-- <div id='vagas' class="form-group">
						<label for="ncolaborador">Número de colaboradores</label>
						<input type="number" min='0' class="form-control" id="ncolaborador" name="ncolaborador">
						<input type='button' value='OK' class="btn btn-primary btn-block" onclick='adicionar()'/><br>
					</div> -->
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