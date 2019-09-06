<?php 
    require_once "./controller_site/controller_relatorio.php";
    //header('Content-Type: application/json; charset=UTF-8');


    $email = $_POST['email'];
    $c = new ControllerRelatorio();
    $lista = $c->relatorio($email);
    
$d = '';
$array = [];
    foreach($lista as $l){
        array_push($array, array(
        "nome_atividade" => $l['nome_atividade'],
         "data" => $l['data'], 
         "inicio"=> $l['hora_inicio'],
        "termino" => $l['hora_fim']
        ));
    }
    $atividades = ['atividades' => $array];

    
   $atividades = json_encode($atividades); 
   
   echo $atividades;

   
   
?>


