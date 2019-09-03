<?php 

$titulo = "Atividades";
$id = $_GET['id'];

require_once("./base/header.php"); 
require_once "../../controller_site/controller_detalhes_atividade.php";

$lista1 = $c->detalhesAtividade($id);
$lista2 = $c->colaboradoresAtividade($id);

foreach($lista1 as $l){
    $dt = explode("/",$l['data']); 
        $y = $dt[2];
        $m = $dt[1];
        $d = $dt[0];

        switch (date("$m")) {
            case "01":    $mes = "Janeiro";     break;
            case "02":    $mes = "Fevereiro";   break;
            case "03":    $mes = "Março";       break;
            case "04":    $mes = "Abril";       break;
            case "05":    $mes = "Maio";        break;
            case "06":    $mes = "Junho";       break;
            case "07":    $mes = "Julho";       break;
            case "08":    $mes = "Agosto";      break;
            case "09":    $mes = "Setembro";    break;
            case "10":    $mes = "Outubro";     break;
            case "11":    $mes = "Novembro";    break;
            case "12":    $mes = "Dezembro";    break; 
        }

        $hora_inicio = explode(":", $l['inicio']);
            $hr = $hora_inicio[0];
            $mn = $hora_inicio[1];

        $hora_fim = explode(":", $l['termino']);
            $hr2 = $hora_fim[0];
            $mn2 = $hora_fim[1];
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
                <p><?php 
                    foreach ($lista2 as $l2){
                        echo $l2['nome']."<br>";
                    }

                ?></p>
                <p><strong>Tipo de atividade</strong></p>
                <p><?php echo $l['tipo']; ?></p>
            </div>
            <div class="col-12 col-md-3">
                <p><strong>Data e hora</strong></p>
                <p><?php echo "$d de $mes de $y"; ?> <br> <?php echo "$hr:$mn às $hr2:$mn2"; ?></p>
                <p><strong>Capacidade</strong></p>
                <p><?php echo $l['capacidade']; ?></p>
            </div>
            <div class="col-12 col-md-6">
                <p>Inscreva-se nesta atividade clicando no botão abaixo. As inscrições estarão disponíveis apenas enquanto houver vagas e após atingir o limite, não será mais possível se inscrever para esta atividade.</p>
                <p>A emissão do certificado estará sujeita a confirmação de presença, mediante assinatura do participante.</p>
                <a href="./formulario.php?id=<?php echo $id; ?>" class="btn btn-rounded btn-primary">Inscrever-se</a>
            </div>
        </div>
    </div>
</section>

<?php } require_once("./base/footer.php"); ?>