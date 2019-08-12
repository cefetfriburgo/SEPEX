<?php

    class Evento{
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex', 'root', '');
        }

        public function listarEvento(){            
            $pd = $this->pdo->query("SELECT * FROM evento");
            $p = $pd->fetchAll();

            foreach($p as $evento){
                echo $evento['nome'] . ', ' . $evento['ano'] . ', ' . $evento['semestre'] . '<br>';
            }
        }

        public function adicionarEvento( $nome, $ano, $semestre){
            $pd = $this->pdo->query("INSERT INTO evento(nome, ano, semestre) VALUES('$nome ', '$ano ', '$semestre ')");
            //echo 'ok';
        }

        public function atualizarEvento($id, $nome, $ano, $semestre){
            $pd = $this->pdo->query("UPDATE evento SET nome= '$nome', ano= '$ano', semestre='$semestre' WHERE idEvento =$id");
        }

        public function excluirEvento($id){
            $pd = $this->pdo->query("DELETE FROM evento WHERE idEvento=$id");
        }

        public function pesquisarEvento($nome){
            $pd = $this->pdo->query("SELECT * FROM evento WHERE nome ='$nome'");
            $p = $pd->fetchAll();

            foreach($p as $evento){
                echo $evento['nome'] . " " . $evento['ano'] . " " . $evento['semestre'] . " " . "<br>" ;// tem de lista nome, ano, semestre
            }
        }

    }

    //$c = new Evento();
    //echo $c->listarEvento();
    //$c->adicionarEvento('Bootstrap5', 2014, 'Primeiro semestre');
    //$c->atualizarEvento(4, 'Montagem', 2015, 'Segundo semestre');
    //$c->excluirEvento(6);
    //$c->pesquisarEvento('Montagem');
?>