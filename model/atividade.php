<?php

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT * FROM atividade a, tipo_atividade t, evento e WHERE a.idEvento = e.idEvento 
            AND t.idTipoAtividade = a.idTipoAtividade");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta){
            $pd = $this->pdo->query("INSERT INTO atividade (idEvento, idTipoAtividade, nome_atividade, descricao, atividade.data, 
            hora_inicio, hora_fim, capacidade) VALUES ($idEvento, $idTipoAtividade, '$nome_atividade', '$descricao', '$data', 
            '$hora_inicio', '$hora_fim', '$capacidade')");
            $pd1 = $this->pdo->query("SELECT MAX(idAtividade) FROM atividade");
            $id = $pd1->fetch();
            $id = $id[0];
            $pd3 = $this->pdo->query("INSERT INTO etiqueta(idAtividade, etiqueta) VALUES($id, '$etiqueta')");
        }

        public function atualizarAtividade($idAtividade, $nome_atividade, $descricao, $capacidade, $idEvento, $idTipoAtividade, $hora_inicio, $hora_fim, $data){
            $pd = $this->pdo->query("UPDATE atividade SET nome_atividade= '$nome_atividade', descricao='$descricao', 
            capacidade='$capacidade', idEvento=$idEvento, idTipoAtividade=$idTipoAtividade, hora_inicio = '$hora_inicio', 
            hora_fim = '$hora_fim', atividade.data = $data WHERE idAtividade = $idAtividade");
            
        }

        public function excluirAtividade($idAtividade){
            $pd = $this->pdo->query("DELETE FROM atividade WHERE idAtividade=$idAtividade");
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
        
        public function nomeAtividade($id){
            $pd = $this->pdo->query("SELECT * FROM atividade WHERE idAtividade = $id ");
            $p = $pd->fetch();
            
            return $p;
        }

        /*public function nomeEtiqueta($id){
            $pd = $this->pdo->query("SELECT * FROM etiqueta WHERE idAtividade = $id");
            $p = $pd->fetch();
            
            return $p;
        }*/



        /*public function pesquisarAtividade($nome_atividade){
            $pd = $this->pdo->query("SELECT * FROM atividade WHERE nome_atividade ='$nome_atividade'");
            $p = $pd->fetchAll();

            return $p;            
        }*/


    }

    
?>