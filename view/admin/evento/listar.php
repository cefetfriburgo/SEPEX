<?php 
$titulo = "Listar eventos";
$categoria = "Eventos";
$local = "Listar eventos";
include_once("../base/header.php"); ?>

<div class="row">
  
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i> Eventos encontrados
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Ações</th>
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <td>1</td>
            <td>Semana de Ensino, Pesquisa e Extensão</td>
            <td>2017</td>
            <td>Segundo semestre</td>
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
            <td>Semana Acadêmica de Sistemas de Informação</td>
            <td>2018</td>
            <td>Primeiro semestre</td>
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