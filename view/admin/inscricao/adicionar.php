<?php 
$titulo = "Registrar Inscrição";
$categoria = "Inscrições";
$local = "Registrar Inscrição";
include_once("../base/header.php"); 
require_once "../../../controller_site/controller_detalhes_atividade.php";

$id = $_GET['id'];
if(isset($_GET['erro'])){
    $erro = $_GET['erro']; 
    if($erro == 1){echo "<script>alert('Inscrito já existente!');</script>"; }
    if($erro == 2){echo "<script>alert('Por favor, preencha todos os campos corretamente!');</script>"; }
}?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Novo participante
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group">
						<label for="nome">Nome do candidato</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
					</div>
					<div class="form-group">
						<label for="email">Endereço de e-mail</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Endereço de e-mail" required>
					</div>
					<div class="form-group form-row">
						<div class="col">
							<label for="cpf">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
						</div>
						<div class="col">
							<label for="email">Data de nascimento</label>
							<input type="date" class="form-control" id="data" name="data" required>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Em relação ao CEFET, o candidato pertence à comunidade:</label>
						<div class="radio">
                            <label><input type="radio" name="comunidade" value="1" checked> Interna</label>
                            <label><input type="radio" name="comunidade" value="2"> Externa</label>
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
				<p>Utilize o formulário ao lado para registrar uma nova inscrição para uma atividade. Será permitido registrar uma nova inscrição mesmo após atingir o limite de vagas ou o horário de início desta atividade.</p>
				<p>Atente-se ao preenchimento de todos os campos do formulário, pois eles são necessários para emissão do certificado.</p>
			</div>
		</div>
	</div>
</div>

<?php include_once("../base/footer.php"); ?>