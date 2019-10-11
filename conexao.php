<?php

class Conexao{
    private static $pdo;

    public static function conectar(){
        if(!isset(self::$pdo)){
            try {
                self::$pdo = new PDO('mysql:host=172.16.50.17;dbname=sepex;charset=utf8', 'sepex', 's3p3x_123#@!');            
            }catch (PDOException $e) {
                print "Error: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return self::$pdo;
    }
}

?>
