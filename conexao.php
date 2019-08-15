<?php

class Conexao{

    public function conectar(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=sepex;charset=utf8', 'root', '');
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

?>