<?php

    class Evento{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function listarEvento(){            
            $pd = $this->pdo->query("SELECT * FROM evento");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarEvento( $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->query("INSERT INTO evento(nome_evento, ano, semestre, data_inicio, hora_inicio, data_fim, hora_fim) 
            VALUES('$nome ', '$ano ', '$semestre', '$data_inicio', '$hora_inicio', '$data_fim', '$hora_fim')");
           
        }

        public function atualizarEvento($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->query("UPDATE evento SET nome_evento= '$nome', ano= '$ano', semestre='$semestre', 
            data_inicio = '$data_inicio', hora_inicio = '$hora_inicio', data_fim = '$data_fim', hora_fim = '$hora_fim' 
            WHERE evento_id =$id");
        }

        public function excluirEvento($id){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE evento_id=$id");
            $pd = $this->pdo->query("DELETE FROM evento WHERE evento_id=$id");
        }

        public function pesquisarEvento($nome){
            $pd = $this->pdo->query("SELECT * FROM evento WHERE nome_evento ='$nome'");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function nomeEvento($id){
            $pd = $this->pdo->query("SELECT * FROM evento WHERE evento_id = $id");
            $p = $pd->fetch();
            
            return $p;
        }

    }

    
?>