<?php

    class Evento{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex', 'root', '');
        }

        public function listarEvento(){            
            $pd = $this->pdo->query("SELECT * FROM evento");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarEvento( $nome, $ano, $semestre){
            $pd = $this->pdo->query("INSERT INTO evento(nome, ano, semestre) VALUES('$nome ', '$ano ', '$semestre ')");
           
        }

        public function atualizarEvento($id, $nome, $ano, $semestre){
            $pd = $this->pdo->query("UPDATE evento SET nome= '$nome', ano= '$ano', semestre='$semestre' WHERE idEvento =$id");
        }

        public function excluirEvento($id){
            $pd = $this->pdo->query("DELETE FROM evento WHERE idEvento=$id");
        }

        public function pesquisarEvento($nome){
            $pd = $this->pdo->query("SELECT * FROM evento WHERE nome ='$nome'");
            $p = $pd->fetchAll();

            return $p;
            
        }

    }

    
?>