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
            $pd = $this->pdo->query("INSERT INTO evento(nome, ano, semestre, data_inicio, hora_inicio, data_fim, hora_fim) 
            VALUES('$nome ', '$ano ', '$semestre', '$data_inicio', '$hora_inicio', '$data_fim', '$hora_fim')");
           
        }

        public function atualizarEvento($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->query("UPDATE evento SET nome= '$nome', ano= '$ano', semestre='$semestre', 
            data_inicio = '$data_inicio' hora_inicio = '$hora_inicio', data_fim = '$data_fim', hora_fim = '$hora_fim' 
            WHERE idEvento =$id");
        }

        public function excluirEvento($id){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE idEvento=$id");
            $pd = $this->pdo->query("DELETE FROM evento WHERE idEvento=$id");
        }

        public function pesquisarEvento($nome){
            $pd = $this->pdo->query("SELECT * FROM evento WHERE nome ='$nome'");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function nomeEvento($id){
            $pd = $this->pdo->query("SELECT * FROM evento WHERE idEvento = $id");
            $p = $pd->fetch();
            
            return $p;
        }

    }

    
?>