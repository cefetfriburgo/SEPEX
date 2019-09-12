<?php

class Conexao{
    private static $pdo;

    public static function conectar(){
        try {
            self::$pdo = new PDO('mysql:host=localhost;dbname=sepex;charset=utf8', 'root', '');
            return self::$pdo;
        }
        catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

?>