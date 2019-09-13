<?php 
date_default_timezone_set('America/Sao_Paulo');
$titulo = "Página inicial";
require_once("./base/header.php");
require_once("../../controller_site/controller_atividade.php"); 
require_once("../../controller_site/controller_evento.php");
require_once("../../controller_site/controller_detalhes_atividade.php");

  
$c = new ControllerAtividade();
$lista = $c->atividade();
$i = new ControllerDetalhesAtividade();

?>
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background: url('../../public/images/capa.jpg');">
             <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">

                            <strong class="cover-xl-text" style="color: white"><?= $nome; ?></strong>
                            <p class="cover-date">
                                <?= $dia_inicio . " a " . $dia_fim . " de " . mesEmString($mes_inicio); ?>
                            </p>
                            <?php if(date("Y-m-d") <= $evento['data_fim']){  ?>
                            <a href="#atividade" class="btn btn-primary btn-rounded" >
                                Inscrições abertas
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a href="../../controller_site/controller_detalhes_atividade.php">teste</a>

<section id="info" class="pt100 pb100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-calendar-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            Data
                        </h5>
                        <p>
                           <?= $dia_inicio . " de " . mesEmString($mes_inicio) . " de " . $ano_inicio; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-location-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            Local
                        </h5>
                        <p>
                            CEFET-RJ, Nova Friburgo
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-box-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            Atividades
                        </h5>
                        <p>
                            <?= $evento['total']. " atividades"; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3  ">
                <div class="icon_box_two">
                    <i class="ion-ios-pricetag-outline"></i>
                    <div class="content">
                        <h5 class="box_title">
                            Inscrições
                        </h5>
                        <p>
                            <?php 
                                if($evento['gratuito'] == 1){
                                    echo "Gratuita";
                                } else {
                                    echo "Paga";
                                }
                            ?> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="sobre" class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                Sobre o CEFET-RJ
            </h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing eli. Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <p>
                    In rhoncus massa nec  sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod quis. Maecenas ornare, ex in malesuada tempus.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="atividade" class="pb100">
    <div class="container">
        <div class="table-responsive">
            <table class="event_calender table">
                <thead class="event_title">
                <tr>
                    <th>
                        <i class="ion-ios-calendar-outline"></i>
                        <span>Atividades</span>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
            <?php foreach ($lista['atividades'] as $l) {
                           
                $lista2 = $i->inscritosAtividade($l['atividade_id']);
                
            ?>
                <tr>
                    <td class="event_date">
                        <?= $l['dia']; ?>
                        <span><?php echo mesEmString($l['mes']); ?></span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5><?= $l['nome_atividade']; ?></h5>
                            <h6><?php echo  $l['hora_inicio'] . " às " . $l['hora_fim']; ?></h6>
                        </div>
                    </td>
                    <td>
                        <a href="./atividade.php?id=<?= $l['atividade_id']; ?>" class="btn btn-primary btn-rounded">Ver mais</a>
                    </td>
                    <td class="buy_link">
                        <?php if($lista2['total'] < $l['capacidade']){

                        ?>
                        <a href="./formulario.php?id=<?= $l['atividade_id']; ?>">Inscrever-se</a>
                        <?php } else{
                            echo "<br><strong>Capacidade de inscritos esgotada</strong>";
                        }?>
                        
                    </td>
                </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once("./base/footer.php"); ?>