<?php 

$titulo = "Registro de Inscrição";
require_once("./base/header.php"); 
require_once "../../controller_site/controller_relatorio.php" ;

?>
<script>
    
    function gerarRelatorio(){
        id = 0;
        email = $('#email').val();
        $('tr').remove();
        var hd = '<tr><th>Atividade</th><th>Data</th><th>Início</th><th>Término</th></tr>';
        $('thead').append(hd);
        
        $.post('../../api/inscricao/relatorio.php', {"email": email}, function($atividades){
            var obj = $atividades;
            
            for(var atividade of obj.atividades){
                id = id+1;
                
                var actv = $('<tr id="md'+id+'"><td id="nome'+id+'">'+atividade.nome_atividade+'</td><td>'+atividade.data+'</td><td>'+atividade.inicio+
                '</td><td>'+atividade.termino+'</td><td><input type="button" class="btn btn-primary" onclick="modal(md'+id+',nome'+id+')" data-toggle="modal" data-target="#cancelar" value="Cancelar"></td></tr>');
                $('#tcorpo').append(actv);
            }
        });
    }
    // var actv = $('<tr><td id="nome'+id+'">'+atividade.nome_atividade+'</td><td>'+atividade.data+'</td><td>'+atividade.inicio+
    //             '</td><td>'+atividade.termino+'</td><td><input type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancelar" value="Cancelar"></td></tr>');
    //             $('#tcorpo').append(actv);
    atividade = '';
    $md = '';
    // cpf = '';

    function modal(md, nome){
        $md = md.id;
        atividade = nome.id;
        
    }

    function confirmar(cpf){
        cpf = document.getElementById(cpf.id).value;
        nome_atividade = document.getElementById(atividade).innerHTML;
         $.post('../../controller_site/cancelar_inscricao_atividade.php', {'cpf':cpf,'atividade':nome_atividade}, function($resposta){
            var obj = $resposta;
            console.log(obj);
        });
        $mdl = document.getElementById($md);
        $mdl.innerHTML='';
            //console.log(document.getElementById(atividade).innerHTML);
    }
    

    function cancelar(){
        //$.get('../../controller_site/cancelar_inscricao_atividade.php?email='+email+',nome='+$n);
       
        //console.log($n, $i, email);
        

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
                <li><a href="/#home">Início</a>  |  </li>
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
                        <tbody id='tcorpo'>
                            
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="cancelar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div id='modal' class="modal-body">
                        <p id = 'prgrf'>Informe seu CPF para cancelar a sua inscrição?</p>
                        <input type='text' id='confirma_cpf' name='confirma_cpf' >
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button"  class="btn btn-primary" onclick='confirmar(confirma_cpf)' data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("./base/footer.php"); ?>
<!-- onclick="cancelar()" -->