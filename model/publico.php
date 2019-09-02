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

    public function exibirColaboradoresAtividade($id){
        $pd = $this->pdo->query("SELECT c.nome FROM colaborador_atividade ca join atividade a on ca.atividade_id=a.idAtividade 
        join colaborador c on ca.colaborador_id=c.colaborador_id WHERE a.idAtividade=ca.atividade_id 
        AND c.colaborador_id=ca.colaborador_id AND a.idAtividade='$id'");
        $p = $pd->fetchAll();

        return $p;
    }


    public function exibirDetalhesAtividade($id){
        $pd2 = $this->pdo->query("SELECT idEvento, idTipoAtividade, nome_atividade, descricao, atividade.data, hora_inicio,
        hora_fim, capacidade FROM atividade WHERE idAtividade='$id'");
        $p2 = $pd2->fetchAll();

        return $p2;
    }

    public function registrarInscricao($atividade_id, $nome_aluno, $email, $cpf){
        $pd = $this->pdo->query("INSERT INTO inscricao(atividade_id, nome_aluno, email, cpf) 
        VALUES('$atividade_id', '$nome_aluno', '$email', '$cpf')");
    }

    public function consultarAtividade($email){
        $pd = $this->pdo->query("SELECT a.nome_atividade, date_format(a.data, '%d/%m/%Y') as 'data', a.hora_inicio, a.hora_fim 
              FROM atividade a JOIN inscricao i ON a.idAtividade=i.atividade_id WHERE i.email='$email'");

        return $pd->fetchAll();
    }

}



?>