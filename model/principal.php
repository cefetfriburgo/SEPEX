<?php
require_once dirname(__FILE__)."./../conexao.php";

    class Principal{
    	private $pdo;

        public function __construct(){
            $this->pdo = Conexao::conectar();
        }

        public function contarEvento(){            
            $pd = $this->pdo->query("SELECT count(*) as total FROM evento");
            $p = $pd->fetch();

            return $p;
            echo $p;            
        }

        public function contarAtividade(){            
            $pd = $this->pdo->query("SELECT count(*) as total FROM atividade");
            $p = $pd->fetch();

            return $p;
            echo $p;            
        }

        public function contarInscricao(){            
            $pd = $this->pdo->query("SELECT count(*) as total FROM inscricao");
            $p = $pd->fetch();

            return $p;
            echo $p;            
        }
    }
?>