<?php

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex', 'root', '');
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT atividade.idAtividade, nome_atividade, tipoAtividade, nome, data_atividade.data 
            FROM atividade JOIN tipo_atividade ON atividade.idTipoAtividade=tipo_atividade.idTipoAtividade JOIN evento ON atividade.idEvento=evento.idEvento JOIN data_atividade ON atividade.idAtividade=data_atividade.idAtividade");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $idAtividade, $hora_inicio, $hora_fim, $data){
            $pd = $this->pdo->query("INSERT INTO atividade(nome_atividade, descricao, capacidade, idEvento, idTipoAtividade) VALUES('$nome_atividade', '$descricao', '$capacidade', $idEvento, $idTipoAtividade)");
            $pd2 = $this->pdo->query("INSERT INTO data_atividade(idAtividade, hora_inicio, hora_fim, data_atividade.data)
            VALUES($idAtividade, $hora_inicio, $hora_fim, $data)");
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade){
            $pd = $this->pdo->query("UPDATE atividade SET nome_atividade= '$nome_atividade', descricao='$descricao', capacidade='$capacidade', idEvento=$idEvento, idTipoAtividade=$idTipoAtividade WHERE idAtividade = $idAtividade");
            $pd2 = $this->pdo->query("UPDATE data_atividade SET hora_inicio = $hora_inicio, hora_fim = $hora_fim, data_atividade.data = $data WHERE data_atividade.idAtividade = atividade.$idAtividade");
        }

        public function excluirAtividade($idAtividade){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE idAtividade=$idAtividade");
            $pd2 = $this->pdo->query("DELETE FROM data_atividade WHERE data_atividade.idAtividade = atividade.$idAtividade");
        }

        public function pesquisarAtividade($nome_atividade){
            $pd = $this->pdo->query("SELECT * FROM atividade WHERE nome_atividade ='$nome_atividade'");
            $p = $pd->fetchAll();

            return $p;
            
        }

    }

    
?>