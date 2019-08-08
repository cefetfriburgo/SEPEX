<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Gerenciamento de Eventos </title>

  <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../public/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="../../controller/login.php" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de e-mail" required="required" autofocus="autofocus">
              <label for="email">E-mail</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required="required">
              <label for="senha">Senha</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Entrar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
