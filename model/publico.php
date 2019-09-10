<?php

class Publico{
    private $pdo = null;

    public function __construct(){
        $this->pdo = new PDO("mysql:local=localhost;dbname=sepex;charset=utf8", 'root', '');
    }

    public function exibirEvento(){
        $pd = $this->pdo->query("SELECT e.nome_evento, e.ano, e.semestre, e.data_inicio, e.hora_inicio, e.data_fim, e.hora_fim, 
        COUNT(atividade_id) as 'total', e.gratuito FROM evento e, atividade a WHERE e.publicado=1");
        $p = $pd->fetch();

        return $p;
    }

    public function exibirAtividade(){
        $pd = $this->pdo->query("SELECT * FROM atividade ORDER BY atividade.data");
        $p = $pd->fetchAll();

        return $p;
    }

    public function exibirColaboradoresAtividade($id){
        $pd = $this->pdo->query("SELECT c.nome FROM colaborador_atividade ca join atividade a on ca.atividade_id=a.atividade_id 
        join colaborador c on ca.colaborador_id=c.colaborador_id WHERE a.atividade_id=ca.atividade_id 
        AND c.colaborador_id=ca.colaborador_id AND a.atividade_id='$id'");
        $p = $pd->fetchAll();

        return $p;
    }


    public function exibirDetalhesAtividade($id){
        $pd2 = $this->pdo->query("SELECT * FROM  listar_atividades_disponiveis WHERE id=$id");
        $p2 = $pd2->fetchAll();

        return $p2;
    }

    public function registrarInscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade){
        $pd = $this->pdo->query("INSERT INTO inscricao(atividade_id, nome_inscrito, email, cpf, comunidade) 
        VALUES('$atividade_id', '$nome_aluno', '$email', '$cpf', '$comunidade')");
    }

    public function consultarAtividade($email){
        $pd = $this->pdo->query("SELECT a.nome_atividade, date_format(a.data, '%d/%m/%Y') as 'data', a.hora_inicio, a.hora_fim 
              FROM atividade a JOIN inscricao i ON a.atividade_id=i.atividade_id WHERE i.email='$email'");

        return $pd->fetchAll();
    }

    public function exibirRelatorio($email){
        $pd = $this->pdo->query("SELECT a.nome_atividade, a.data, a.hora_inicio, a.hora_fim FROM inscricao i JOIN atividade a ON 
        a.atividade_id=i.atividade_id WHERE email='$email'");

        return $pd->fetchAll();
        
    }

    public function quantidadeInscritos($id){
        $pd = $this->pdo->query("SELECT count(*) as total from inscricao join atividade on inscricao.atividade_id = atividade.atividade_id where atividade.atividade_id = $id");

        return $pd->fetch();
    }

    public function exibirDatasAtividade($id){
        $pd2 = $this->pdo->query("SELECT nome FROM  listar_atividades_disponiveis WHERE id=$id");
        $pd3 = $pd2->fetch();
        $nome = $pd3[0];
        $p3 = $this->pdo->query("SELECT * FROM  listar_atividades_disponiveis WHERE nome='$nome'");
        $p2 = $p3->fetchAll();

        return $p2;
    }

}



?>