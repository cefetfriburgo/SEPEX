<?php 

$titulo = "Página inicial";
require_once("./base/header.php");
require_once("../../controller/listar_atividade.php"); ?>

<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background: url('https://images.even3.com.br/m43YapikFZxhrn6d8dvqK78-ez8=/1300x536/smart/even3.blob.core.windows.net/banner/DSCN0552.9de0b944d18c464d9f43.JPG');">
             <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <!-- <h2 class="cover-title">
                                CEFET-RJ campus Nova Friburgo apresenta
                            </h2> -->
                            <strong class="cover-xl-text" style="color: white">SEPEX 2019</strong>
                            <p class="cover-date">
                                22 e 23 de outubro
                            </p>
                            <a href="#" class=" btn btn-primary btn-rounded" >
                                Inscrições abertas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                            22 e 23 de outubro 2019
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
                            +60 apresentações
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
                            Gratuita
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--event info end -->

<!--about the event -->
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
            <?php foreach ($lista as $l) { 
                $dt = explode("-",$l['data']); 
                $d = $dt[2];
                $m = $dt[1];
                $y = $dt[0]; 

                $hi = $l['hora_inicio'];
            ?>
                <tr>
                    <td>
                        <img src="assets/img/cleander/c1.png" alt="event">
                    </td>
                    <td class="event_date">
                        <?php echo $d; ?>
                        <span>Outubro</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5><?php echo $l['nome_atividade']; ?></h5>
                            <h6><?php echo $hi. " às ". $l['hora_fim']; ?></h6>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Ver mais</a>
                    </td>
                    <td class="buy_link">
                        <a href="#">Inscrever-se</a>
                    </td>
                </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once("./base/footer.php"); ?>

