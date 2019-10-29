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
                    <div id='bloco' class="form-group">
					    <label for="nome">Nome</label>
					    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do colaborador" required>
				    </div>
				    <div id='bloco' class="form-group">
				    	<label for="sobre">Sobre</label>
						<textarea class="form-control" id="sobre" name="sobre" rows="3" placeholder="Descrição do colaborador"></textarea>
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
					<li><strong>Nome do colaborador</strong>: escreva o nome do colaborador que você deseja adicionar. Este colaborador não poderá se repetir no sistema.</li>
					<li><strong>Sobre</strong>: escreva um breve resumo sobre este colaborador. Este campo é opcional.</li>
				</ul>
				<p>Após conferir todos os campos, clique no botão <strong>Salvar</strong>.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>