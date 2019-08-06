<?php

class Conexao{

    public function conectar(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=sepex', 'root', '');
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

?>