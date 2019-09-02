<?php

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT * FROM listar_atividades");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $array, $papel){
            $pd = $this->pdo->query("INSERT INTO atividade (evento_id, tipo_atividade_id, nome_atividade, descricao, atividade.data, 
            hora_inicio, hora_fim, capacidade) VALUES ($idEvento, $idTipoAtividade, '$nome_atividade', '$descricao', '$data', 
            '$hora_inicio', '$hora_fim', '$capacidade')");
            $pd1 = $this->pdo->query("SELECT MAX(atividade_id) FROM atividade");
            $id = $pd1->fetch();
            $id = $id[0];
            $pd3 = $this->pdo->query("INSERT INTO etiqueta(atividade_id, etiqueta) VALUES($id, '$etiqueta')");
            $t = 0;

            foreach($array as $a){
                $pd = $this->pdo->query("SELECT colaborador_id FROM colaborador WHERE nome='$a'");
                $p = $pd->fetch();
                $n = $p[0];
                $paper = $papel[$t];
                $p = $this->pdo->query("INSERT INTO colaborador_atividade(colaborador_id, atividade_id, papel_id) VALUES('$n', '$id', $paper)");
                $t++;
                
            }//
            // foreach($array as $a){
            //     $pd4 = $this->pdo->query("INSERT INTO colaborador(nome) VALUES('$a')"); 
            //     $t++;  
            // }
            // echo $t;
            // $pd5 = $this->pdo->query("SELECT idColaborador FROM colaborador order by idColaborador desc limit $t");
            // $col_atividade = $pd5->fetchAll();
            // foreach($col_atividade as $ca){
            //     $c = $ca['idColaborador'];
            //     $pd6 = $this->pdo->query("INSERT INTO colaborador_atividade(idColaborador, idAtividade) VALUES('$c', '$id')");
            // }
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){
            $pd = $this->pdo->query("UPDATE atividade SET nome_atividade= '$nome_atividade', descricao='$descricao', 
            capacidade='$capacidade', idEvento='$idEvento', idTipoAtividade='$idTipoAtividade', hora_inicio = '$hora_inicio', 
            hora_fim = '$hora_fim', atividade.data = '$data' WHERE atividade_id = '$idAtividade'");
            $pd = $this->pdo->query("UPDATE etiqueta SET etiqueta.etiqueta = '$etiqueta' WHERE atividade_id = '$idAtividade'");            
        }

        public function excluirAtividade($idAtividade){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE atividade_id=$idAtividade");
        }

        public function listarEvento(){
            $pd = $this->pdo->query("SELECT evento_id, nome_evento FROM evento");
            $p = $pd->fetchAll();

            return $p; 
        }

        public function listarTipoAtividade(){
            $pd = $this->pdo->query("SELECT tipo_atividade_id, nome_tipo_atividade FROM tipo_atividade");
            $p = $pd->fetchAll();

            return $p;
        }
        
        public function nomeAtividade($id){
            $pd = $this->pdo->query("SELECT * FROM atividade a JOIN etiqueta e ON a.atividade_id=e.atividade_id WHERE a.atividade_id = $id");
            $p = $pd->fetch();
            
            return $p;
        }

       public function listarColaborador(){
            $pd = $this->pdo->query("SELECT * FROM colaborador");
            $p = $pd->fetchAll();
            return $p;           
       }

       public function adicionarColaborador($array){
            foreach($array as $nome){
                $pd = $this->pdo->query("INSERT INTO colaborador(nome) VALUE('$nome')");
            }           
       }

       public function listarPapel(){
           $pd = $this->pdo->query("SELECT * FROM papel");
           $p = $pd->fetchAll();
           return $p;
       }

    }

    
?>