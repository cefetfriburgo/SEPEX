<?php
require_once dirname(__FILE__)."./../conexao.php";

    class Evento{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();
        }

        public function listarEvento(){            
            $pd = $this->pdo->query("SELECT * FROM evento");
            if(isset($pd) && !empty($pd)){
                $p = $pd->fetchAll();

                return $p;
            }else return 0;
                        
        }

        public function adicionarEvento( $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->prepare("INSERT INTO evento(nome_evento, ano, semestre, data_inicio, hora_inicio, data_fim, hora_fim, publicado, gratuito) 
            VALUES(?,?,?,?,?,?,?,?,?)");

            $publicado = 0;
            $gratuito = 1;

            $pd->execute(array($nome , $ano , $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim, $publicado, $gratuito));
           
        }

        public function atualizarEvento($id, $nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim){
            $pd = $this->pdo->prepare("UPDATE evento SET nome_evento= ?, ano= ?, semestre=?, 
            data_inicio = ?, hora_inicio = ?, data_fim = ?, hora_fim = ? WHERE evento_id =?");

            $pd->execute(array($nome, $ano, $semestre, $data_inicio, $hora_inicio, $data_fim, $hora_fim, $id));         
        }

        public function excluirEvento($id){
            $pd = $this->pdo->prepare("DELETE FROM atividade WHERE evento_id = ?");
            $pd->execute(array($id));

            $pd = $this->pdo->prepare("DELETE FROM evento WHERE evento_id = ?");
            $pd->execute(array($id));

        }

        public function pesquisarEvento($nome){
            $pd = $this->pdo->prepare("SELECT * FROM evento WHERE nome_evento = ?");
            $pd->execute(array($nome));

            $p = $pd->fetchAll();

            return $p;            
        }

        public function nomeEvento($id){
            $pd = $this->pdo->prepare("SELECT * FROM evento WHERE evento_id = ?");
            $pd->execute(array($id));

            $p = $pd->fetch();
            
            return $p;
        }

        public function eventoDisponivel(){
            $pd = $this->pdo->query("SELECT nome_evento, evento_id FROM evento");
            $p = $pd->fetchAll();

            return $p;
        }

        public function despublicarEvento($id){
            $pd = $this->pdo->prepare("UPDATE evento SET publicado = 0 WHERE evento_id = ?");
            $pd->execute(array($id));
        }

        public function publicarEvento($id){
            $pd = $this->pdo->prepare("UPDATE evento SET publicado = 1 WHERE evento_id = ?");
            $pd->execute(array($id));
        }

        public function eventoAtual(){
            $pd = $this->pdo->query("SELECT nome_evento, evento_id FROM evento WHERE publicado = 1");
            $p = $pd->fetch();

            return $p;
        }

        public function gerenciarInscricao(){
            $pd = $this->pdo->prepare("SELECT a.atividade_id, a.nome_atividade, CASE WHEN COUNT(i.atividade_id) > 0 THEN COUNT(i.atividade_id) ELSE 0 END AS total 
            from atividade a join evento e on a.evento_id=e.evento_id
            join inscricao i on a.atividade_id=i.atividade_id where e.publicado=1 group by i.atividade_id");
            $pd->execute();
            $p = $pd->fetchAll();            

            return $p;

        }

        public function listarParticipante($atividade_id){
            $pd = $this->pdo->prepare("SELECT i.inscricao_id, i.nome_inscrito, i.email, i.cpf, DATE_FORMAT(i.data_inscricao, '%d/%m/%Y %H:%i') AS data_inscricao, i.presente FROM inscricao i JOIN atividade a ON i.atividade_id=a.atividade_id WHERE i.atividade_id=?");
            $pd->execute(array($atividade_id));
            $p = $pd->fetchAll();

            return $p;

        }

        public function inicioAtividade($atividade_id){
            $pd = $this->pdo->prepare("SELECT nome_atividade, date_format(atividade.data, '%d/%m/%Y') as 'data', date_format(hora_inicio, '%H:%i') as hora_inicio, local FROM atividade WHERE atividade_id=?");
            $pd->execute(array($atividade_id));
            $p = $pd->fetch();
            
            return $p;
        }

        public function confirmarPresenca($id, $presenca){
            $pd = $this->pdo->prepare("UPDATE inscricao SET presente = ? WHERE inscricao_id = ?");
            $pd->execute(array($presenca, $id));
            header('location: ./../view/admin/inscricao/gerenciar.php');
        }

    }

    
   $c = new Evento();

   $lista = $c->gerenciarInscricao();

?>