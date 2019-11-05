<?php
require_once dirname(__FILE__)."./../conexao.php";

class Publico{

    private $pdo = null;

    public function __construct(){
        $this->pdo = Conexao::conectar();
    }

    public function exibirEvento(){
        $pd = $this->pdo->query("SELECT e.nome_evento, e.ano, e.semestre, e.data_inicio, e.hora_inicio, e.data_fim, e.hora_fim, 
        (SELECT COUNT(a.atividade_id) as 'a.total' FROM atividade a JOIN evento e ON a.evento_id=e.evento_id WHERE e.publicado=1) as 'total',
         e.gratuito FROM evento e, atividade a WHERE e.publicado=1");
        $p = $pd->fetch();

        return $p;
    }

    public function exibirAtividade(){
        $pd = $this->pdo->query("SELECT a.nome_atividade, a.capacidade, ad.hora_inicio, ad.hora_fim, a.atividade_id, ad.data 
        FROM atividade a JOIN evento e ON a.evento_id = e.evento_id JOIN tipo_atividade ta ON a.tipo_atividade_id=ta.tipo_atividade_id 
        JOIN atividade_data ad ON ad.atividade_id=a.atividade_id WHERE e.publicado = 1 
        ORDER BY ad.data, FIELD(ta.nome_tipo_atividade, 'minicurso','palestra')");
        $p = $pd->fetchAll();

        return $p;
    }

    public function exibirColaboradoresAtividade($id){
        $pd = $this->pdo->prepare("SELECT c.nome_colaborador FROM colaborador_atividade ca join atividade a on ca.atividade_id=a.atividade_id 
        join colaborador c on ca.colaborador_id=c.colaborador_id WHERE a.atividade_id=ca.atividade_id 
        AND c.colaborador_id=ca.colaborador_id AND a.atividade_id=?");

        $pd->execute(array($id));

        $p = $pd->fetchAll();

        return $p;
    }


    public function exibirDetalhesAtividade($id){
        $pd2 = $this->pdo->prepare("SELECT * FROM  listar_atividades_disponiveis WHERE id=?");

        $pd2->execute(array($id));

        $p2 = $pd2->fetchAll();

        return $p2;
    }

    public function registrarInscricao($atividade_id, $nome_aluno, $email, $cpf, $comunidade, $nascimento){
        $pd1 = $this->pdo->prepare("SELECT atividade_id FROM atividade WHERE nome_atividade = (SELECT nome_atividade FROM atividade WHERE atividade_id=?)");
        $pd1->execute(array($atividade_id));
        $p1 = $pd1->fetchAll();

        foreach($p1 as $id){
            $pd2 = $this->pdo->prepare("INSERT INTO inscricao(atividade_id, nome_inscrito, email, cpf, comunidade, data_nascimento) 
            VALUES(?, capitalizar(?), ?, ?, ?, ?)");
            $pd2->execute(array($id['atividade_id'], $nome_aluno, $email, $cpf, $comunidade, $nascimento));
        }
        
    }

    public function consultarAtividade($email){
        $pd = $this->pdo->prepare("SELECT a.nome_atividade, date_format(a.data, '%d/%m/%Y') as 'data', a.hora_inicio, a.hora_fim 
              FROM atividade a JOIN inscricao i ON a.atividade_id=i.atividade_id WHERE i.email=?");

        $pd->execute(array($email));

        return $pd->fetchAll();
    }

    public function exibirRelatorio($email){
        $pd = $this->pdo->prepare("SELECT a.nome_atividade, a.data, a.hora_inicio, a.hora_fim FROM inscricao i JOIN atividade a ON 
        a.atividade_id=i.atividade_id WHERE email=? order by a.data asc");

        $pd->execute(array($email));

        return $pd->fetchAll();
        
    }

    public function quantidadeInscritos($id){
        $pd = $this->pdo->prepare("SELECT count(*) as total from inscricao join atividade on inscricao.atividade_id = atividade.atividade_id
        where atividade.atividade_id = ?");

        $pd->execute(array($id));

        $p = $pd->fetch();

        return $p;
    }

    public function exibirDatasAtividade($id){
        $pd2 = $this->pdo->prepare("SELECT nome FROM  listar_atividades_disponiveis WHERE id=?");
        
        $pd2->execute(array($id));
        $pd3 = $pd2->fetch();
        $nome = $pd3[0];
        
        $p3 = $this->pdo->prepare("SELECT atividade.atividade_id as 'id', atividade.nome_atividade as 'nome', atividade.descricao 
        as 'descricao', atividade_data.data as data, atividade_data.hora_inicio as 'inicio', atividade_data.hora_fim 
        as 'termino', atividade.capacidade as 'capacidade', tipo_atividade.nome_tipo_atividade 'tipo', evento.nome_evento as 'evento' 
        FROM atividade JOIN evento ON atividade.evento_id=evento.evento_id JOIN tipo_atividade 
        ON atividade.tipo_atividade_id=tipo_atividade.tipo_atividade_id JOIN atividade_data ON atividade_data.atividade_id=atividade.atividade_id 
        WHERE evento.publicado=1 AND atividade.nome_atividade=?");

        $p3->execute(array($nome));

        $p2 = $p3->fetchAll();

        return $p2;
    }

    public function verificarExistencia($id, $nome, $email, $cpf){

        $v2 = 0; $v3 = 0;

        $pd2 = $this->pdo->prepare("SELECT count(*) FROM inscricao JOIN atividade ON inscricao.atividade_id=atividade.atividade_id 
        WHERE inscricao.email=? AND atividade.nome_atividade=(SELECT atividade.nome_atividade WHERE atividade.atividade_id=?)");

        $pd2->execute(array($email, $id));

        $pd3 = $this->pdo->prepare("SELECT count(*) FROM inscricao JOIN atividade ON inscricao.atividade_id=atividade.atividade_id 
        WHERE cpf=? AND atividade.nome_atividade=(SELECT atividade.nome_atividade WHERE atividade.atividade_id=?)");

        $pd3->execute(array($cpf, $id));

        $v2 = $pd2->fetch();
        $v3 = $pd3->fetch();
        
        if($v2[0] == 0 && $v3[0] == 0){
           return 0;
        }else{
           return 1;
        }        

    }

    public function cancelarInscricao($atividade_id, $email, $cpf){
        $pd = $this->pdo->prepare("DELETE FROM inscricao WHERE atividade_id=? AND email=? AND cpf=?");
        $pd->execute(array($atividade_id, $email, $cpf));
    }

    public function inscricaoAtividade($cpf, $nome_atividade){
        $pd = $this->pdo->prepare("SELECT COUNT(atividade_id) FROM inscricao WHERE cpf = ?");
        $pd->execute(array($cpf));
        $p = $pd->fetch();


         if($p[0]>0){
             $pd = $this->pdo->prepare("SELECT atividade_id FROM atividade WHERE nome_atividade = ?");
             $pd->execute(array($nome_atividade));
             $p = $pd->fetchAll();

             foreach($p as $valor){
                 $pd = $this->pdo->prepare("DELETE FROM inscricao WHERE cpf=? AND atividade_id=?");
                 $pd->execute(array($cpf, $valor['atividade_id']));
             }

             return 1;

         }else{
             return 0;
         }

    }

    public function exibirDataInicio($id){
        $pd = $this->pdo->prepare("SELECT a.data as 'data', a.hora_inicio as 'hora' FROM atividade_data a WHERE a.atividade_id = ? ORDER BY a.data LIMIT 1");
        $pd->execute(array($id));
        $p = $pd->fetch();
        return $p;
    }
}

//   $c = new Publico();

//   // echo $c->inscricaoAtividade('42226692029', 'Testando');
//   $c->registrarInscricao(10, 'dentoso', 'dentoso@cefet-rj.br', '24009075015', '1', '2003-02-01');

?>