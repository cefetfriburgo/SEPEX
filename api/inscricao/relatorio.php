<?php 
    require_once "./../../controller_site/controller_relatorio.php";


    $email = $_POST['email'];
    $c = new ControllerRelatorio();
    $lista = $c->relatorio($email);
    
$d = '';
$array = [];
    foreach($lista as $l){
        array_push($array, array(
        "nome_atividade" => $l['nome_atividade'],
         "data" => date('d-m-Y', strtotime($l['data'])), 
         "inicio"=> date('H:i', strtotime($l['hora_inicio'])),
        "termino" => date('H:i', strtotime($l['hora_fim']))
        ));
    }
    $atividades = ['atividades' => $array];

    
   $atividades = json_encode($atividades); 
   
   echo $atividades;

   
   
?>


