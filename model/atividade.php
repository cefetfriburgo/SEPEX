<?php
require_once dirname(__FILE__)."./../conexao.php";

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();//new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT * FROM listar_atividades");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $array, $papel){
            $pd = $this->pdo->query("INSERT INTO atividade (evento_id, tipo_atividade_id, nome_atividade, descricao, atividade.data, 
            hora_inicio, hora_fim, capacidade) VALUES ($evento_id, $idTipoAtividade, '$nome_atividade', '$descricao', '$data', 
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
                
            }
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){
            $pd = $this->pdo->query("UPDATE atividade SET nome_atividade= '$nome_atividade', descricao='$descricao', 
            capacidade='$capacidade', evento_id='$evento_id', tipo_atividade_id='$idTipoAtividade', hora_inicio = '$hora_inicio', 
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
            $pd = $this->pdo->query("SELECT * FROM atividade a WHERE a.atividade_id = $id");
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