<?php
    require_once dirname(__FILE__).'./../model/publico.php';

    class ControllerDetalhesAtividade{
        private $detalhesAtividade;

        public function __construct(){
            $this->detalhesAtividade = new Publico();
        }

        public function detalhesAtividade($id){
           
            $registros =  $this->detalhesAtividade->exibirDetalhesAtividade($id);
            $dados = [];
            $mes = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach($registros as $i => $registro){
                $m = explode('/', $registro['data']);
                array_push($dados, array(
                    'id' => $registro['id'],
                    'nome' => $registro['nome'],
                    'capacidade' => $registro['capacidade'],
                    'descricao' => $registro['descricao'],
                    'local' => $registro['local'],
                    'tipo' => $registro['tipo'],
                    'evento' => $registro['evento']                
                ));
                
            } 
            
            $datas = ['detalhes' => $dados];
            return $datas;
        }

        public function colaboradoresAtividade($id){
            
            $lista2 = $this->detalhesAtividade->exibirColaboradoresAtividade($id);
            
            
            
            if(count($lista2) > 1){
            	$colaboradores = [];
            	foreach ($lista2 as $l2){
                    array_push($colaboradores, $l2['nome_colaborador']);
                }                    
                	$la = array_pop($colaboradores);
            		$colaboradores = implode( ', ', $colaboradores ) . ' e ' . $la;
        	} else {
            		foreach ($lista2 as $l2){
                    	$colaboradores = $l2['nome_colaborador'];
                 	}
                }
                if(!$lista2){
                    $colaboradores = '';
                }

            return $colaboradores;
           
        }

        public function inscritosAtividade($id){
            return $this->detalhesAtividade->quantidadeInscritos($id);
        }

        public function datasAtividade($id){
           
            $registros =  $this->detalhesAtividade->exibirDatasAtividade($id);
            $dados = [];
            $mes = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach($registros as $i => $registro){
                $m = date('m', strtotime($registro['data']));
                array_push($dados, array(
                    'inicio' => date('H:i', strtotime($registro['inicio'])),
                    'termino' => date('H:i', strtotime($registro['termino'])),
                    'dia' => date('d', strtotime($registro['data'])),
                    'mes' => $mes[$m-1],
                    'ano' => date('Y', strtotime($registro['data']))                 
                ));
            }
           
            $datas = ['dados' => $dados];
            return $datas;
        }

        public function dataInicio($id){
            return $this->detalhesAtividade->exibirDataInicio($id);
        }
        
    }

     $c = new ControllerDetalhesAtividade();

?>

