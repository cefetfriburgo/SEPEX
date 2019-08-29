<?php 

$titulo = "Atividades";
$id = $_GET['id'];
$nome = $_GET['nome_atividade'];
require_once("./base/header.php"); 


//require_once("../../controller_site/controller_detalhes_atividade.php");

//$c->detalhesAtividade($id);

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
                <li><a href="/#inicio">Início</a>  |  </li>
                <li><a href="#">Atividade</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                 <?php echo $nome; ?>
            </h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <p>
                    <?php echo "aqui será exibido a descrição do evento em questão"; ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt50">
            <div class="col-12 col-md-3">
                <p><strong>Colaboradores</strong></p>
                <p>Mariclédia da Silva, Jupetônio Azeredo e Claudereza Duarte</p>
                <p><strong>Tipo de atividade</strong></p>
                <p>Minicurso</p>
            </div>
            <div class="col-12 col-md-3">
                <p><strong>Data e hora</strong></p>
                <p>22 de outubro de 2019 <br> 13:00 às 18:00</p>
                <p><strong>Capacidade</strong></p>
                <p>40 pessoas</p>
            </div>
            <div class="col-12 col-md-6">
                <p>Inscreva-se nesta atividade clicando no botão abaixo. As inscrições estarão disponíveis apenas enquanto houver vagas e após atingir o limite, não será mais possível se inscrever para esta atividade.</p>
                <p>A emissão do certificado estará sujeita a confirmação de presença, mediante assinatura do participante.</p>
                <button href="#" class="btn btn-rounded btn-primary" type="submit">Inscrever-se</button>
            </div>
        </div>
    </div>
</section>

<?php require_once("./base/footer.php"); ?>