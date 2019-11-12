<?php
require_once dirname(__FILE__)."./../conexao.php";

    class Atividade{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();
        }

        public function listarAtividade(){            
            $pd = $this->pdo->query("SELECT * FROM atividade a JOIN atividade_data ad ON a.atividade_id=ad.atividade_id");
            $p = $pd->fetchAll();

            return $p;            
        }

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $datas, $colab, $local){
            
                $pd = $this->pdo->prepare("INSERT INTO atividade (evento_id, tipo_atividade_id, nome_atividade, descricao, local,  
                capacidade) VALUES (?,?,?,?,?,?)");
                $pd->execute(array($evento_id, $idTipoAtividade, $nome_atividade, $descricao, $local,  $capacidade));


                $pd1 = $this->pdo->query("SELECT MAX(atividade_id) FROM atividade");
                $id = $pd1->fetch();
                $id = $id[0];

                foreach($datas as $dat){
                    $pd = $this->pdo->prepare("INSERT INTO atividade_data(atividade_id,	data, hora_inicio, hora_fim)
                    VALUES (?,?,?,?)");
                    $pd->execute(array($id, $dat['data'], $dat['hora_inicio'], $dat['hora_fim']));
                }
                
                
                foreach($colab as $c){
                    $pd = $this->pdo->prepare("INSERT INTO colaborador_atividade(colaborador_id, atividade_id, papel_id)
                        VALUES(?,?,?)");
                        $pd->execute(array($c['nome'], $id, $c['papel']));            
                }
        }

        public function adicionarEtiqueta($etiqueta){
            $eti= explode(",", $etiqueta);
            for($i=0; $i<sizeof($eti); $i++){
                $pd = $this->pdo->prepare("INSERT INTO etiqueta(atividade_id, etiqueta) VALUES ((select max(atividade_id) from atividade),?)");
                $pd->execute(array( $eti[$i]));
            }
        }

        public function atualizarAtividade($idDataAtividade, $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $local, $colaboradores){       
            $pd = $this->pdo->prepare("SELECT atividade_id FROM atividade_data WHERE atividade_data_id=?");
            $pd->execute(array($idDataAtividade));
            $p = $pd->fetch();
            $i = $p[0];

            $pd = $this->pdo->prepare("UPDATE atividade SET nome_atividade=? , descricao=?, 
            capacidade=?, evento_id=?, tipo_atividade_id=?, local = ? WHERE atividade_id = ?");
            $pd->execute(array($nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $local, $i));

            $pd = $this->pdo->prepare("DELETE FROM etiqueta WHERE atividade_id = ?");
            $pd->execute(array($i));

            $pd = $this->pdo->prepare("UPDATE atividade_data SET hora_inicio = ?, hora_fim = ?, data = ? WHERE atividade_data_id=?");
            $pd->execute(array($hora_inicio, $hora_fim, $data, $idDataAtividade));

            for($i=0; $i<sizeof($colaboradores); $i++){
                $pd = $this->pdo->prepare("UPDATE colaborador_atividade SET colaborador_id = ?, atividade_id = ? WHERE atividade_id = ?");
                $pd->execute(array($colaboradores[$i], $idDataAtividade, $idDataAtividade));
            }
        }

        public function atualizarEtiqueta($idDataAtividade, $etiqueta){
            $pd = $this->pdo->prepare("SELECT atividade_id FROM atividade_data WHERE atividade_data_id=?");
            $pd->execute(array($idDataAtividade));
            $p = $pd->fetch();
            $i = $p[0];
            $pd = $this->pdo->prepare("INSERT INTO etiqueta(atividade_id, etiqueta) VALUES(?, ?)");
            $pd->execute(array($i, $etiqueta));
        }

        public function excluirAtividade($idDataAtividade){
            $pd = $this->pdo->prepare("SELECT atividade_id FROM atividade_data WHERE atividade_data_id=?");
            $pd->execute(array($idDataAtividade));
            $pex = $pd->fetch();
            $excluir_id = $pex[0];

            $pd = $this->pdo->prepare("DELETE FROM atividade_data WHERE atividade_data_id=?");
            $pd->execute(array($idDataAtividade));

            $pd = $this->pdo->prepare("SELECT COUNT(atividade_data_id) FROM atividade_data WHERE atividade_id=?");
            $pd->execute(array($excluir_id));
            $p = $pd->fetch();
            $p = $p[0];

            if($p == 0){
                $pd = $this->pdo->prepare("DELETE FROM atividade WHERE atividade_id=?");
                $pd->execute(array($excluir_id));

                $pd = $this->pdo->prepare("DELETE FROM colaborador_atividade WHERE atividade_id=?");
                $pd->execute(array($excluir_id));
            }
            return $p;
        }

        public function listarEvento(){
            $pd = $this->pdo->query("SELECT evento_id, nome_evento FROM evento");
            $p = $pd->fetchAll();

            return $p; 
        }

        public function listarTipoAtividade(){
            $pd = $this->pdo->query("SELECT tipo_atividade_id, nome_tipo_atividade FROM tipo_atividade");
            $p = $pd->fetchAll();

            return $p;
        }
        
        public function nomeAtividade($id){
            $pd = $this->pdo->prepare("SELECT * FROM atividade a JOIN atividade_data ad ON a.atividade_id=ad.atividade_id 
            WHERE ad.atividade_data_id = ?");
            $pd->execute(array($id));
            $p = $pd->fetch();
            
            return $p;
        }

       public function listarColaborador(){
            $pd = $this->pdo->query("SELECT * FROM colaborador");
            $p = $pd->fetchAll();
            return $p;           
       }

       public function listarColaboradorAtividade($id){
            $pd = $this->pdo->prepare("SELECT colaborador.colaborador_id as 'colaborador_id', colaborador.nome_colaborador as 'colaborador', atividade_data.atividade_data_id as 'id_ativ' FROM colaborador_atividade JOIN colaborador ON colaborador_atividade.colaborador_id=colaborador.colaborador_id JOIN atividade ON colaborador_atividade.atividade_id=atividade.atividade_id JOIN atividade_data ON atividade.atividade_id=atividade_data.atividade_id WHERE atividade_data.atividade_data_id = ?");
            $pd->execute(array($id));
            $p = $pd->fetchAll();
            return $p;           
       }

       public function adicionarColaborador($nome, $sobre){
            $pd = $this->pdo->prepare("INSERT INTO colaborador(nome_colaborador, sobre) VALUES(?, ?)");
            $pd->execute(array($nome, $sobre));         
       }

       public function listarPapel(){
           $pd = $this->pdo->query("SELECT * FROM papel");
           $p = $pd->fetchAll();
           return $p;
       }

       public function listarEtiqueta($id){
            $pd = $this->pdo->prepare("SELECT atividade_id FROM atividade_data WHERE atividade_data_id=?");
            $pd->execute(array($id));
            $p = $pd->fetch();
            $i=$p[0];

            $pd = $this->pdo->prepare("SELECT * FROM etiqueta e WHERE e.atividade_id = ?");
            $pd->execute(array($i));
            $p = $pd->fetchAll();
            return $p;
        }

    }

   
?>