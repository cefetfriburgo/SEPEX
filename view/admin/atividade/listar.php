<?php 
$titulo = "Listar atividade";
$categoria = "Atividades";
$local = "Listar atividades";
require_once("../base/header.php"); ?>

<div class="row">
  
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Atividades encontradas
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Evento</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Evento</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <td>1</td>
            <td>Programação com Python</td>
            <td>Oficina</td>
            <td>Semana de Extensão</td>
            <td>23/10/2019</td>
            <td>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Escolher 
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="editar/id">Editar</a>
                  <a class="dropdown-item" href="#">Excluir</a>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Entendendo sobre Scrum</td>
            <td>Minicurso</td>
            <td>Semana de Extensão</td>
            <td>24/10/2019</td>
            <td>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Escolher 
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="editar/id">Editar</a>
                  <a class="dropdown-item" href="#">Excluir</a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include_once("../base/footer.php"); ?>