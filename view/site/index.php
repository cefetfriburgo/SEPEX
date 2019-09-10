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

                            <strong class="cover-xl-text" style="color: white"><?php echo $nome; ?></strong>
                            <p class="cover-date">
                                <?php echo $dia_inicio . " a " . $dia_fim . " de " . mesEmString($mes_inicio); ?>
                            </p>
                            <?php if(date("Y-m-d") <= $evento['data_fim']){  ?>
                            <a href="#" class=" btn btn-primary btn-rounded" >
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
                           <?php echo $dia_inicio . " de " . mesEmString($mes_inicio) . " de " . $ano_inicio; ?>
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
                            <?php echo $evento['total']. " atividades"; ?>
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
            <?php foreach ($lista as $l) {
                           
                $lista2 = $i->inscritosAtividade($l['atividade_id']);

                $dt = explode("-",$l['data']); 
                $d = $dt[2];
                $m = $dt[1];
                $y = $dt[0]; 

                $hora1 = explode(":", $l['hora_inicio']);
                $hr = $hora1[0];
                $mn = $hora1[1];

                $hora2 = explode(":", $l['hora_fim']);
                $hr2 = $hora2[0];
                $mn2 = $hora2[1];
            ?>
                <tr>
                    <td class="event_date">
                        <?php echo $d; ?>
                        <span><?php switch (date("$m")) {
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
                         
                         echo $mes; ?></span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5><?php echo $l['nome_atividade']; ?></h5>
                            <h6><?php echo $hr. ":". $mn. " às ". $hr2. ":". $mn2; ?></h6>
                        </div>
                    </td>
                    <td>
                        <a href="./atividade.php?id=<?php echo $l['atividade_id']; ?>" class="btn btn-primary btn-rounded">Ver mais</a>
                    </td>
                    <td class="buy_link">
                        <?php if($lista2['total'] < $l['capacidade']){

                        ?>
                        <a href="./formulario.php?id=<?php echo $l['atividade_id']; ?>">INSCREVER-SE</a>
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