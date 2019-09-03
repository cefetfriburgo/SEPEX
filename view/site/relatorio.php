<?php 

$titulo = "Registro de Inscrição";
require_once("./base/header.php"); 
require_once "../../controller_site/controller_inscricao.php" ;

?>
<script>
    $d = document;

    function gerar_relatorio(){
        tabela = $d.getElementById('tabela');
        email = $d.getElementById('email').value;
        
        <?php $email ?>
        
        thead = "<thead><tr><th>Atividade</th><th>data</th><th>Início</th><th>Término</th></tr></thead><tbody><?php $lista = $c->relatorio($email); foreach($lista as $l){ ?><tr><td><?php echo $l['nome_atividade'];?><td><td><?php echo $l['data'];?></td><td><?php echo $l['hora_inicio'];?></td><td><?php echo $l['hora_fim'];?></td></tr></tbody><?php } ?></tbody>";
        tabela.innerHTML = thead;
        
        
    }
    
</script>
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="../../public/images/capa.jpg">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                        Registro de Inscrição
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="/#inicio">Início</a>  |  </li>
                <li><a href="#">Registros de Inscrição</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                 Emitir relatório
            </h3>
        </div>

        <div class="row justify-content-center mt50">
            <div class="col-12 col-md-6">
                <p>Para emitir o relatório de atividades inscritas no evento <strong><?php echo "Semana de Extensão 2019"; ?></strong>, preencha no campo ao lado o endereço de e-mail utilizado por você no ato da inscrição.</p>
                <p>Ao clicar em <strong>Pesquisar</strong>, será exibido na tela a lista de atividades inscritas por este endereço de e-mail, se houver.</p>
            </div>
            <div class="col-12 col-md-6">
                <!-- <form class="contact_form" action="../../controller_site/controller_inscricao.php" method="POST"> -->
                
                    <label for="nome">Endereço de e-mail</label>
                    <div class="form-group">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Endereço de e-mail utilizado na inscrição">
                    </div>
                    <!-- <button href="#" onclick="gerar_relatorio()" class="btn btn-rounded btn-primary" type="submit">Pesquisar</button> -->
                
                <input type="button" href="#" onclick="gerar_relatorio()" class="btn btn-rounded btn-primary" value="Pesquisar">                
            </div>
            <div class="col-12 col-md-12" id="relatorio">
                <table id="tabela">

                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once("./base/footer.php"); ?>