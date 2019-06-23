<?php

class connect{
    public static function connect(){
        try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $pdo;
    }
}