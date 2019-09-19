<?php 

$titulo = "Atividades";
$id = $_GET['id'];

require_once("./base/header.php"); 
require_once "../../controller_site/controller_detalhes_atividade.php";

$lista1 = $c->detalhesAtividade($id);
$lista2 = $c->colaboradoresAtividade($id);
$lista3 = $c->inscritosAtividade($id);
$lista4 = $c->datasAtividade($id);

foreach($lista1['detalhes'] as $l){
?>

<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="../../public/images/capa.jpg">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                        Atividades 
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="./#home">Início</a>  |  </li>
                <li><a href="#">Atividade</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                 <?php echo $l['nome']; ?>
            </h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <p>
                    <?php echo $l['descricao']; ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt50">
            <div class="col-12 col-md-3">
                <p><strong>Colaboradores</strong></p>
                <p>
                    <?php echo $lista2;	?>
                	
                </p>
                <p><strong>Tipo de atividade</strong></p>
                <p><?php echo $l['tipo']; ?></p>
            </div>
            <div class="col-12 col-md-3">
                <p><strong>Data e hora</strong></p>
                <?php foreach($lista4['dados'] as $l2){;?>
                <p><?php echo $l2['dia'] . " de " . $l2['mes'] . " de " . $l2['ano']; ?> <br> <?php echo $l2['inicio'].' às '. $l2['termino'];?></p>
            <?php } ?>
                <p><strong>Capacidade</strong></p>
                <p><?php echo $l['capacidade']; ?></p>
            </div>
            <div class="col-12 col-md-6">
                <p>Inscreva-se nesta atividade clicando no botão abaixo. As inscrições estarão disponíveis apenas enquanto houver vagas e após atingir o limite, não será mais possível se inscrever para esta atividade.</p>
                <p>A emissão do certificado estará sujeita a confirmação de presença, mediante assinatura do participante.</p>
                <?php if($lista3['total'] < $l['capacidade']){

                ?>
                <a href="./formulario.php?id=<?php echo $id; ?>" class="btn btn-rounded btn-primary">Inscrever-se</a>
                <?php } else{
                    echo "<br><strong>Capacidade de inscritos esgotada.</strong>";
                }?>
            </div>
        </div>
    </div>
</section>

<?php } require_once("./base/footer.php"); ?>