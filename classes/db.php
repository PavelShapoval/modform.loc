<?php

/*class connect{
    public static function connect(){
        try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $pdo;
    }
}*/



class DB
{
    private static $_instance = null;

    // для безопасности настройки лучше хранить в файле с конфигом
    const DB_HOST = 'localhost';
    const DB_NAME = 'form';
    const DB_USER = 'root';
    const DB_PASS = '';

    private function __construct () {

        $this->_instance = new PDO(
            'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
            self::DB_USER,
            self::DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );

    }

    private function __clone () {}
    private function __wakeup () {}

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return new self;
    }
}