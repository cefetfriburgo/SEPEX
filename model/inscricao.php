<?php
    require_once dirname(__FILE__)."./../conexao.php";

    class Inscricao{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();
        }

        public function listarInscritos($atividade_id){
        	$pd = $this->pdo->query("SELECT i.nome_inscrito, i.email, a.nome_atividade, t.nome_tipo_atividade, a.data FROM inscricao i JOIN atividade a ON i.atividade_id=a.atividade_id JOIN tipo_atividade t ON a.tipo_atividade_id=t.tipo_atividade_id WHERE i.atividade_id=$atividade_id");
            $p = $pd->fetchAll(PDO::FETCH_ASSOC);

            return $p;
        }
    }

    $c = new Inscricao();

    // $inscrito = $c->listarInscritos(1);
    // foreach ($inscrito as $i) {
    //     echo $i['nome_inscrito'];
    // }
?>