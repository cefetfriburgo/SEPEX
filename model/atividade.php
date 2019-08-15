<?php

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex', 'root', '');
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT * FROM atividade");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade){
            $pd = $this->pdo->query("INSERT INTO atividade(nome_atividade, descricao, capacidade, idEvento, idTipoAtividade) VALUES('$nome_atividade', '$descricao', '$capacidade', $idEvento, $idTipoAtividade)");
           
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade){
            $pd = $this->pdo->query("UPDATE atividade SET nome_atividade= '$nome_atividade', descricao='$descricao', capacidade='$capacidade', idEvento=$idEvento, idTipoAtividade=$idTipoAtividade WHERE idAtividade =$idAtividade");
        }

        public function excluirAtividade($idAtividade){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE idAtividade=$idAtividade");
        }

        public function pesquisarAtividade($nome_atividade){
            $pd = $this->pdo->query("SELECT * FROM atividade WHERE nome_atividade ='$nome_atividade'");
            $p = $pd->fetchAll();

            return $p;
            
        }

    }

    
?>