<?php

class Conexao{
    private static $pdo;

    public static function conectar(){
        if(!isset(self::$pdo)){
            try {
                self::$pdo = new PDO('mysql:host=localhost;dbname=sepex;charset=utf8', 'root', '');            
            }catch (PDOException $e) {
                print "Error: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return self::$pdo;
    }
}

?>
