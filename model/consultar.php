<?php
//Listagem 7: Select em PDO

$consulta = $pdo->query("SELECT nome, usuario FROM login;");
 
  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
}
?>