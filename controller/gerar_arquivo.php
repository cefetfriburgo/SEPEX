<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=relatorio.csv');

require_once dirname(__FILE__)."./../model/inscricao.php";

$atividade_id=$_GET['atividade_id'];

class ControllerArquivo{

	private $arquivo;

	public function __construct(){
		$this->arquivo = new Inscricao();
	}

	public function gerarArquivo($atividade_id){

		$saida = fopen('php://output', 'w');
		fputcsv($saida, array('NOME COMPLETO', 'E-MAIL', 'NOME DA ATIVIDADE', 'TIPO DA ATIVIDADE', 'DATA'));

		$linhas = $this->arquivo->listarInscritos($atividade_id);
		foreach ($linhas as $l) {
			fputcsv($saida, $l);
		}
	}
}

	$ctrlArquivo = new ControllerArquivo();
    $ctrlArquivo->gerarArquivo($atividade_id);
?>