<?php
    require_once dirname(__FILE__).'./../model/publico.php';

    class ControllerDetalhesAtividade{
        private $detalhesAtividade;

        public function __construct(){
            $this->detalhesAtividade = new Publico();
        }

        public function detalhesAtividade($id){
            //return $this->detalhesAtividade->exibirDetalhesAtividade($id);

            $registros =  $this->detalhesAtividade->exibirDetalhesAtividade($id);
            $dados = [];
            $mes = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach($registros as $i => $registro){
                $m = date('m', strtotime($registro['data']));
                array_push($dados, array(
                    'id' => $registro['id'],
                    'nome' => $registro['nome'],
                    'capacidade' => $registro['capacidade'],
                    'descricao' => $registro['descricao'],
                    'tipo' => $registro['tipo'],
                    'evento' => $registro['evento'],
                    'inicio' => date('H:i', strtotime($registro['inicio'])),
                    'termino' => date('H:i', strtotime($registro['termino'])),
                    'dia' => date('d', strtotime($registro['data'])),
                    'mes' => $mes[$m-1],
                    'ano' => date('Y', strtotime($registro['data']))                 
                ));
            } 
            
            $datas = ['detalhes' => $dados];
            return $datas;
        }

        public function colaboradoresAtividade($id){
            //return $this->detalhesAtividade->exibirColaboradoresAtividade($id);
            $lista2 = $this->detalhesAtividade->exibirColaboradoresAtividade($id);
            
            
            if(count($lista2) > 1){
            	$colaboradores = [];
            	foreach ($lista2 as $l2){
                    array_push($colaboradores, $l2['nome']);
                }                    
                	$la = array_pop($colaboradores);
            		$colaboradores = implode( ', ', $colaboradores ) . ' e ' . $la;
        	} else {
            		foreach ($lista2 as $l2){
                    	$colaboradores = $l2['nome'];
                 	}
                }

            return $colaboradores;
           
        }

        public function inscritosAtividade($id){
            return $this->detalhesAtividade->quantidadeInscritos($id);
        }

        public function datasAtividade($id){
            //return $this->detalhesAtividade->exibirDatasAtividade($id);
            $registros =  $this->detalhesAtividade->exibirDatasAtividade($id);
            $dados = [];
            $mes = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            foreach($registros as $i => $registro){
                $m = date('m', strtotime($registro['data']));
                array_push($dados, array(
                    // 'id' => $registro['id'],
                    // 'nome' => $registro['nome'],
                    // 'capacidade' => $registro['capacidade'],
                    // 'descricao' => $registro['descricao'],
                    // 'tipo' => $registro['tipo'],
                    // 'evento' => $registro['evento'],
                    'inicio' => date('H:i', strtotime($registro['inicio'])),
                    'termino' => date('H:i', strtotime($registro['termino'])),
                    'dia' => date('d', strtotime($registro['data'])),
                    'mes' => $mes[$m-1],
                    'ano' => date('Y', strtotime($registro['data']))                 
                ));
            }
            //var_dump($dados);

            $datas = ['dados' => $dados];
            return $datas;
        }
        
    }

     $c = new ControllerDetalhesAtividade();

    echo $c->colaboradoresAtividade(1);
    //  $lista = $c->detalhesAtividade(1);
    //  $lista4 = $c->datasAtividade(1);

    //  foreach($lista4['dados'] as $l4){
    //     echo $l4['dia'] .'/ ' . $l4['mes'] . '/' .$l4['ano'] . "<br>" ;
    //  }

     
    // //  foreach($lista['dados'] as $l){
    //      echo $l['data'];
    //  }

  /*Textos completos	
id-
nome-
descricao
data-
inicio-
termino-
capacidade-
tipo-
evento- */
?>

