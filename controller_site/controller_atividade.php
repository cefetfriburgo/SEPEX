<?php
    require dirname(__FILE__).'./../model/publico.php';

    class ControllerAtividade{
        private $atividade;

        public function __construct(){
            $this->atividade = new Publico();
        }

        public function atividade(){
           $atividades = [];
           $registros = $this->atividade->exibirAtividade();
           foreach($registros as $registro){
               $data = $registro['data'];
               
               array_push($atividades, array(
                          'capacidade' => $registro['capacidade'],
                          'atividade_id' => $registro['atividade_id'],
                          'nome_atividade' => $registro['nome_atividade'],
                          'dia' => date("d", strtotime($data)),
                          'mes' => date("m", strtotime($data)),
                          'ano' => date("Y", strtotime($data)),
                          'hora_inicio' => date("H:i", strtotime($registro['hora_inicio'])),
                          'hora_fim' => date("H:i", strtotime($registro['hora_fim']))));
          }
          $atividades = ['atividades' => $atividades];
          return $atividades;
        }
    }
?>

