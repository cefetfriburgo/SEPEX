<?php
require_once dirname(__FILE__)."./../conexao.php";

    class Evento{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();//new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function listarEvento(){            
            $pd = $this->pdo->query("SELECT * FROM evento");
            if(isset($pd) && !empty($pd)){
                $p = $pd->fetchAll();

                return $p;
            }else return 0;
                        
        }

        public function adicionarEvento( $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->prepare("INSERT INTO evento(nome_evento, ano, semestre, data_inicio, hora_inicio, data_fim, hora_fim) 
            VALUES(?,?,?,?,?,?,?)");

            $pd->execute(array($nome , $ano , $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim));
           
        }

        public function atualizarEvento($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->prepare("UPDATE evento SET nome_evento= ?, ano= ?, semestre=?, 
            data_inicio = ?, hora_inicio = ?, data_fim = ?, hora_fim = ? WHERE evento_id =?");

            $pd->execute(array($nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim, $id));         
        }

        public function excluirEvento($id){
            $pd = $this->pdo->prepare("DELETE FROM atividade WHERE evento_id = ?");
            $pd->execute(array($id));

            $pd = $this->pdo->prepare("DELETE FROM evento WHERE evento_id = ?");
            $pd->execute(array($id));

        }

        public function pesquisarEvento($nome){
            $pd = $this->pdo->prepare("SELECT * FROM evento WHERE nome_evento = ?");
            $pd->execute(array($nome));

            $p = $pd->fetchAll();

            return $p;            
        }

        public function nomeEvento($id){
            $pd = $this->pdo->prepare("SELECT * FROM evento WHERE evento_id = ?");
            $pd->execute(array($id));

            $p = $pd->fetch();
            
            return $p;
        }

        public function eventoDisponivel(){
            $pd = $this->pdo->query("SELECT nome_evento, evento_id FROM evento");
            $p = $pd->fetchAll();

            return $p;
        }

        public function despublicarEvento($id){
            $pd = $this->pdo->prepare("UPDATE evento SET publicado = 0 WHERE evento_id = ?");
            $pd->execute(array($id));
        }

        public function publicarEvento($id){
            $pd = $this->pdo->prepare("UPDATE evento SET publicado = 1 WHERE evento_id = ?");
            $pd->execute(array($id));
        }

        public function eventoAtual(){
            $pd = $this->pdo->query("SELECT nome_evento, evento_id FROM evento WHERE publicado = 1");
            $p = $pd->fetch();

            return $p;
        }

    }

    
?>