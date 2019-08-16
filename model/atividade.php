<?php

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT atividade.idAtividade, nome_atividade, tipoAtividade, nome, data_atividade.data 
            FROM atividade JOIN tipo_atividade ON atividade.idTipoAtividade=tipo_atividade.idTipoAtividade JOIN evento 
            ON atividade.idEvento=evento.idEvento JOIN data_atividade ON atividade.idAtividade=data_atividade.idAtividade");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){
            $pd = $this->pdo->query("INSERT INTO atividade(nome_atividade, descricao, capacidade, idEvento, idTipoAtividade) 
            VALUES('$nome_atividade', '$descricao', '$capacidade', $idEvento, $idTipoAtividade)");
            $pd1 = $this->pdo->query("SELECT MAX(idAtividade) FROM atividade");
            $id = $pd1->fetch();
            $id = $id[0];
            $pd2 = $this->pdo->query("INSERT INTO data_atividade(idAtividade, hora_inicio, hora_fim, data_atividade.data)
            VALUES($id, '$hora_inicio', '$hora_fim', '$data')");
            $pd3 = $this->pdo->query("INSERT INTO etiqueta(idAtividade, etiqueta) VALUES($id, '$etiqueta')");
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade){
            $pd = $this->pdo->query("UPDATE atividade SET nome_atividade= '$nome_atividade', descricao='$descricao', capacidade='$capacidade', idEvento=$idEvento, idTipoAtividade=$idTipoAtividade WHERE idAtividade = $idAtividade");
            $pd2 = $this->pdo->query("UPDATE data_atividade SET hora_inicio = $hora_inicio, hora_fim = $hora_fim, data_atividade.data = $data WHERE data_atividade.idAtividade = atividade.$idAtividade");
        }

        public function excluirAtividade($idAtividade){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE idAtividade=$idAtividade");
            $pd2 = $this->pdo->query("DELETE FROM data_atividade WHERE data_atividade.idAtividade = atividade.$idAtividade");
        }

        public function listarEvento(){
            $pd = $this->pdo->query("SELECT idEvento, nome FROM evento");
            $p = $pd->fetchAll();

            return $p; 
        }

        public function listarTipoAtividade(){
            $pd = $this->pdo->query("SELECT idTipoAtividade, tipoAtividade FROM tipo_atividade");
            $p = $pd->fetchAll();

            return $p;
        }
        /*public function pesquisarAtividade($nome_atividade){
            $pd = $this->pdo->query("SELECT * FROM atividade WHERE nome_atividade ='$nome_atividade'");
            $p = $pd->fetchAll();

            return $p;            
        }*/


    }

    
?>