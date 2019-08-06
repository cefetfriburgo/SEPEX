<?php 
    //Listagem 4: Update usando PDO
  
  $id = 5;
  $nome = "Novo nome do Ricardo";
     
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $stmt = $pdo->prepare('UPDATE minhaTabela SET nome = :nome WHERE id = :id');
    $stmt->execute(array(
      ':id'   => $id,
      ':nome' => $nome
    ));
       
    echo $stmt->rowCount(); 
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
?>