<?php

class Conexao{
    private static $pdo;

    public static function conectar(){
        if(!isset(self::$pdo)){
            try {
                self::$pdo = new PDO('mysql:host=172.16.50.17;dbname=sepex_dev;charset=utf8', 'app', 'aplicacao89');            
            }catch (PDOException $e) {
                print "Error: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return self::$pdo;
    }
}

?>
