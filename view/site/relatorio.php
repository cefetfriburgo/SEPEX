<?php 

$titulo = "Registro de Inscrição";
require_once("./base/header.php"); 
require_once "../../controller_site/controller_relatorio.php" ;

?>
<script>
    $d = document;
    
    function gerarRelatorio(){
        email = $d.getElementById('email').value;
        $('tr').remove();
        var hd = '<tr><th>Atividade</th><th>Data</th><th>Início</th><th>Término</th></tr>';
        $('thead').append(hd);
        
        $.post('../../api/inscricao/relatorio.php', {"email": email}, function($atividades){
            var obj = JSON.parse($atividades);
            
            for(var atividade of obj.atividades){
                var actv = $('<tr><td>'+atividade.nome_atividade+'</td><td>'+atividade.data+'</td><td>'+atividade.inicio+
                '</td><td>'+atividade.termino+'</td></tr>');
                $('tbody').append(actv);
            }
        });
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
        <?php $c = new ControllerRelatorio(); $lista = $c->evento(); $nome = $lista[0]; ?>
            <p>Para emitir o relatório de atividades inscritas no evento <strong><?php echo $nome; ?></strong>, preencha no campo ao lado o endereço de e-mail utilizado por você no ato da inscrição.</p>
            <p>Ao clicar em <strong>Pesquisar</strong>, será exibido na tela a lista de atividades inscritas por este endereço de e-mail, se houver.</p>
        
        </div>
            <div class="col-12 col-md-6">
                <form class="contact_form" onsubmit='return false;'>                
                    <label for="nome">Endereço de e-mail</label>
                    <div class="form-group">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Endereço de e-mail utilizado na inscrição">
                    </div>
                    <button href="#" class="btn btn-rounded btn-primary" onclick='gerarRelatorio()' >Pesquisar</button>
                </form>
            </div>                        
        </div>
        <div class="row justify-content-center mt50">
            <div class="col-12 col-md-12">
                <div class="table-responsive">
                    <table id='tabela' class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("./base/footer.php"); ?>