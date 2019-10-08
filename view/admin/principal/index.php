<?php 
$titulo = "Página inicial";
$categoria = "Início";
$local = null;
include_once("../base/header.php"); 
require_once("./../../../controller/contar_evento.php");
require_once("./../../../controller/contar_atividade.php");
require_once("./../../../controller/contar_inscricao.php");

?>

<div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?php if($qtdEvento >= 1)echo $qtdEvento['total']; else echo 0; if($qtdEvento['total'] <= 1) echo " evento"; else echo " eventos"; ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="./../evento/listar.php">
                <span class="float-left">Ver mais detalhes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php if($qtdAtividade >= 1) echo $qtdAtividade['total']; else echo 0; if($qtdAtividade['total'] <= 1) echo " atividade"; else echo " atividades"; ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="./../atividade/listar.php">
                <span class="float-left">Ver mais detalhes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php if($qtdInscricao >=1) echo $qtdInscricao['total']; else echo 0; if($qtdInscricao['total'] <= 1) echo " inscrito"; else echo " inscritos"; ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver mais detalhes</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i> Sobre o sistema
          </div>
          <div class="card-body">
            <p>Este sistema foi desenvolvido para gerenciar os eventos do CEFET-RJ campus Nova Friburgo. Somente membros da comunidade interna estão autorizados a acessá-lo através do e-mail institucional.</p>
            <p>Para iniciar, você deverá primeiro registrar um evento. Em seguida, acesse o menu de atividade para registrá-las. Feito isso, as atividades registradas serão disponibilizadas publicamente para inscrições dentro do prazo estipulado definido em seu evento.</p>
          </div>
        </div> -->

<?php include_once("../base/footer.php"); ?>


<?php
?>