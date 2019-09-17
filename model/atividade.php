<?php
require_once dirname(__FILE__)."./../conexao.php";

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT * FROM listar_atividades");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $array, $papel){
            $pd = $this->pdo->prepare("INSERT INTO atividade (evento_id, tipo_atividade_id, nome_atividade, descricao, atividade.data, 
            hora_inicio, hora_fim, capacidade) VALUES (?,?,?,?,?,?,?,?)");
            $pd->execute(array($evento_id, $idTipoAtividade, $nome_atividade, $descricao, $data, $hora_inicio, $hora_fim, $capacidade));

            $pd1 = $this->pdo->query("SELECT MAX(atividade_id) FROM atividade");
            $id = $pd1->fetch();
            $id = $id[0];
            $pd3 = $this->pdo->prepare("INSERT INTO etiqueta(atividade_id, etiqueta) VALUES(?,?)");
            $pd3->execute(array($id, $etiqueta));
            $t = 0;

            foreach($array as $a){
                $pd = $this->pdo->prepare("SELECT colaborador_id FROM colaborador WHERE nome=?");
                $pd->execute(array($a));
                $p = $pd->fetch();
                $n = $p[0];
                $paper = $papel[$t];
                $p = $this->pdo->prepare("INSERT INTO colaborador_atividade(colaborador_id, atividade_id, papel_id) VALUES(?, ?, ?)");
                $p->execute(array($n, $id, $paper));
                $t++;
                
            }
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){       
            $pd = $this->pdo->prepare("UPDATE atividade SET nome_atividade=? , descricao=?, 
            capacidade=?, evento_id=?, tipo_atividade_id=?, hora_inicio = ?, hora_fim = ?, atividade.data = ? WHERE atividade_id = ?");

            $pd->execute(array($nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim,
            $data, $idAtividade));

            $pd = $this->pdo->prepare("UPDATE etiqueta SET etiqueta.etiqueta = ? WHERE atividade_id = ?");
            $pd->execute(array($etiqueta, $idAtividade));           
        }

        public function excluirAtividade($idAtividade){
            $pd = $this->pdo->prepare("DELETE FROM atividade WHERE atividade_id=?");

            $pd->execute(array($idAtividade));
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
            $pd = $this->pdo->prepare("SELECT * FROM atividade a WHERE a.atividade_id = ?");
            $pd->execute(array($id));
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
                $pd = $this->pdo->prepare("INSERT INTO colaborador(nome) VALUE(?)");
                $pd->execute(array($nome));
            }           
       }

       public function listarPapel(){
           $pd = $this->pdo->query("SELECT * FROM papel");
           $p = $pd->fetchAll();
           return $p;
       }

    }
    
?>