<?php
	require_once dirname(__FILE__)."./../model/inscricao.php";

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');

	$atividade_id=$_GET['atividade_id'];

	class ControllerArquivo{
		private $arquivo;

		public function __construct(){            
            $this->arquivo = new Inscricao();
        }
        public function gerarArquivo($atividade_id){
        	$saida = fopen('php://output', 'w');

			fputcsv($saida, array('NOME COMPLETO', 'E-MAIL', 'NOME DA ATIVIDADE', 'TIPO DA ATIVIDADE', 'DATA'));

			// $conexao = mysqli_connect('localhost', 'root', '');
			// 	if(!$conexao){
			// 		die("Não foi possível conectar" .mysql_error());
			// 	}
			// mysqli_select_db($conexao, 'teste') or die ("Erro ao selecionar banco" .mysql_error());
			// mysqli_set_charset($conexao,"utf8");
			
			// $query = "SELECT nome,matricula,email FROM presentes WHERE atividade_id=$atividade";
			// $linhas = mysqli_query($conexao, $query);
			$linhas = $this->arquivo->listarInscritos($atividade_id);
			// while ($linha = mysqli_fetch_assoc($linhas)) 
			// 	fputcsv($saida, $linha);
			foreach ($linhas as $l) {
				fputcsv($saida, $l);
			}
        }	
	}

	$ctrlArquivo = new ControllerArquivo();
    $ctrlArquivo->gerarArquivo($atividade_id);
?>