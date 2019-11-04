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

        public function adicionarAtividade( $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $datas, $array, $papel, $local){
            
                $pd = $this->pdo->prepare("INSERT INTO atividade (evento_id, tipo_atividade_id, nome_atividade, descricao, local,  
                capacidade) VALUES (?,?,?,?,?,?)");
                $pd->execute(array($evento_id, $idTipoAtividade, $nome_atividade, $descricao, $local,  $capacidade));

                $pd1 = $this->pdo->query("SELECT MAX(atividade_id) FROM atividade");
                $id = $pd1->fetch();
                $id = $id[0];
                // $pd3 = $this->pdo->prepare("INSERT INTO etiqueta(atividade_id, etiqueta) VALUES(?,?)");
                // $pd3->execute(array($id, $etiqueta));
                $t = 0;
                foreach($datas as $dat){
                    $pd = $this->pdo->prepare("INSERT INTO atividade_data(atividade_id,	data, hora_inicio, hora_fim)
                    VALUES (?,?,?,?)");
                    $pd->execute(array($id, $dat['data'], $dat['hora_inicio'], $dat['hora_fim']));
                }//$dat['hora_inicio'], $dat['hora_fim'],

                foreach($array as $a){
                    $pd = $this->pdo->prepare("SELECT colaborador_id FROM colaborador WHERE nome=?");
                    $pd->execute(array($a));
                    $p = $pd->fetch();
                    $n = $p[0];
                    $paper = $papel[$t];
                    $p = $this->pdo->prepare("INSERT INTO colaborador_atividade(colaborador_id, atividade_id, papel_id) VALUES(?, ?, ?)");
                    $p->execute(array($n, $id, $paper));
                    $t++;                    
                }
            
            // foreach($datas as $dat){
            //     echo $dat['data'] . ' ' . $dat['hora_inicio'] . ' ' . $dat['hora_fim'] . '<br>' ;
            // }
        }

        public function adicionarEtiqueta($etiqueta){
            $eti= explode(",", $etiqueta);
            for($i=0; $i<sizeof($eti); $i++){
                $pd = $this->pdo->prepare("INSERT INTO etiqueta(atividade_id, etiqueta) VALUES ((select max(atividade_id) from atividade),?)");
                $pd->execute(array( $eti[$i]));
            }
        }

        public function atualizarAtividade($idDataAtividade, $nome_atividade, $descricao, $capacidade, $evento_id, $idTipoAtividade, $hora_inicio, $hora_fim, $data, $etiqueta, $local){       
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
            //echo $idAtividade;
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

    //$c = new Atividade();
?>