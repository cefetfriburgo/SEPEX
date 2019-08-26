<?php

class Publico{
    private $pdo = null;

    public function __construct(){
        $this->pdo = new PDO("mysql:local=localhost;dbname=sepex", 'root', '');
    }

    public function exibirEvento(){
        $pd = $this->pdo->query("SELECT e.nome, e.ano, e.semestre, e.data_inicio, e.hora_inicio, e.data_fim, e.hora_fim, 
        COUNT(idAtividade) as 'total' FROM evento e, atividade a WHERE e.publicado=1");
        $p = $pd->fetchAll();

        return $p;
    }

    public function exibirAtividade(){
        $pd = $this->pdo->query("SELECT * FROM atividade");
        $p = $pd->fetchAll();

        return $p;
    }

    public function exibirDetalhesAtividade($id){
        $pd = $this->pdo->query("SELECT a.nome_atividade, a.descricao, a.data, a.hora_inicio, a.hora_fim, a.capacidade, c.nome 
        FROM colaborador_atividade ca join atividade a on ca.atividade_id=a.idAtividade join colaborador c 
        on ca.colaborador_id=c.colaborador_id WHERE a.idAtividade=ca.atividade_id AND c.colaborador_id=ca.colaborador_id 
        AND a.idAtividade='$id'");
        $p = $pd->fetchAll();

        return $p;
    }

}



?>