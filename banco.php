<?php 
    require_once "./controller_site/controller_relatorio.php";
    header('Content-Type: application/json');


    $c = new ControllerRelatorio();
    $lista = $c->relatorio("pedro@cefet-rj.br");
    
$d = '';
$array = [];
    foreach($lista as $l){
        array_push($array, array(
        "nome_atividade" => $l['nome_atividade'],
         "data" => $l['data'], 
         "inicio"=> $l['hora_inicio'],
        "termino" => $l['hora_fim']));
    }
   $d = json_encode($array);
   echo $d;
   
?>


