<?php 
$titulo = "Gerenciar evento";
$categoria = "Eventos";
$local = "Gerenciar evento";
include_once("../base/header.php");
if($_SESSION['acesso'] == 'Administrador'){
require_once "./../../../controller/gerenciar_evento.php";?>

<div class="row">
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-plus"></i> Publicar evento
			</div>
			<div class="card-body">
				<?php 
					if(isset($publicado[0])){
				?>


				<p>O evento <?php echo "<strong>$publicado[0]</strong>"; ?> está atualmente selecionado como publicado. Para ver mais detalhes sobre este evento, <a href="./editar.php?id=<?php echo $publicado[1]; ?>">clique aqui</a>.</p>
					<?php }else{ echo "Nenhum evento publicado";}?>
				<form action="./../../../controller/gerenciar_evento.php" method="POST">
					<input type="hidden" id="id_evento_atual" name="id_evento_atual" value="<?php echo $publicado[1]; ?>">
					<div class="form-group">
						<label for="titulo">Selecionar evento</label>
						<select class="form-control" id="evento" name="evento">
							<?php foreach($lista as $l){ 
								echo "<option value='$l[1]'>". $l[0] ."</option>";
								}
							?>
						</select>
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
				<p>O sistema permite apenas a publicação de um evento por vez. Selecione no campo ao lado o evento o qual você deseja publicá-lo no site.</p>
			</div>
		</div>
	</div>
</div>

<?php } else{
  header("Location: ./../principal/index.php");
}

include_once("../base/footer.php"); ?>