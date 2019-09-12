<?php 
header("Content-Type: application/json");
require_once "./../../controller_site/controller_relatorio.php";


$email = $_POST['email'];

$relatorio = new ControllerRelatorio();
$registros = $relatorio->relatorio($email);

$atividade = [];

    foreach($registros as $registro){
        array_push($atividade, array(
            "nome_atividade" => $registro['nome_atividade'],
            "data" => date('d-m-Y', strtotime($registro['data'])),
            "inicio"=> date('H:i', strtotime($registro['hora_inicio'])),
            "termino" => date('H:i', strtotime($registro['hora_fim']))
        ));
    }

    $atividades = ['atividades' => $atividade];
    $atividades = json_encode($atividades); 

    echo $atividades;


   
   
?>


