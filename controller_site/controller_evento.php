<?php
    require_once dirname(__FILE__).'./../model/publico.php';

    class ControllerEvento{
        private $evento;

        public function __construct(){
            $this->evento = new Publico();
        }

        public function evento(){
            return $this->evento->exibirEvento();
        }
    }
    $e = new ControllerEvento();
    $evento = $e->evento();
    $nome = $evento['nome_evento'];
    $dataInicio = $evento['data_inicio'];
        $dia_inicio = date("d", strtotime($dataInicio));
        $mes_inicio = date("m", strtotime($dataInicio));
        $ano_inicio = date("Y", strtotime($dataInicio));
    $dataFim = $evento['data_fim'];
        $dia_fim = date("d", strtotime($dataFim));
        $mes_fim = date("m", strtotime($dataFim));
        $ano_fim = date("Y", strtotime($dataFim));
    $horaInicio = $evento['hora_inicio'];
    $horaFim = $evento['hora_fim'];

    function mesEmString($numeroDoMes){
        switch ($numeroDoMes) {
            case "01":    return "Janeiro";     break;
            case "02":    return "Fevereiro";   break;
            case "03":    return "Março";       break;
            case "04":    return "Abril";       break;
            case "05":    return "Maio";        break;
            case "06":    return "Junho";       break;
            case "07":    return "Julho";       break;
            case "08":    return "Agosto";      break;
            case "09":    return "Setembro";    break;
            case "10":    return "Outubro";     break;
            case "11":    return "Novembro";    break;
            case "12":    return "Dezembro";    break; 
        }
    }
?>

