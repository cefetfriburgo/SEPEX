<?php

    class Principal{
    	private $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:local=localhost;dbname=sepex;charset=utf8', 'root', '');
        }

        public function contarEvento(){            
            $pd = $this->pdo->query("SELECT count(*) as total FROM evento");
            $p = $pd->fetchAll();

            return $p;
            echo $p;            
        }

        public function contarAtividade(){            
            $pd = $this->pdo->query("SELECT count(*) as total FROM atividade");
            $p = $pd->fetchAll();

            return $p;
            echo $p;            
        }

        public function contarInscricao(){            
            $pd = $this->pdo->query("SELECT count(*) as total FROM inscricao");
            $p = $pd->fetchAll();

            return $p;
            echo $p;            
        }
    }
?>