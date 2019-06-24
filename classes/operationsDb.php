<?php
//namespace classes;
/*$connect = mysqli_connect('localhost', 'root', '', 'form');
if(!$connect){
    die('нет соединения с бд');
} else {
    echo 'есть коннект';
}*/
//$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
//$mysqli = new mysqli('localhost', 'root', '', 'form');

/*if(!$mysqli){
    die('нет соединения с бд');
} else {
    echo 'есть коннект<br>';
}*/
$pdo = DB::getInstance();
global $pdo;



class operationsDb extends db{



    public function __construct()
    {


    }

    /**
     * @return mixed
     */
    /*public function getPdo()
    {
        $pdo = DB::getInstance();
        return $pdo;
    }*/
    public static function connect(){
        try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $pdo;
    }


    public function install($mysqli){
        mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS fields (
                                field_id INT(5) AUTO_INCREMENT PRIMARY KEY,
                                field_value TEXT)");
        mysqli_query($mysqli, "CREATE TABLE `forms` (
	                          `key_id` INT(5) NOT NULL AUTO_INCREMENT,
	                          `form_id` VARCHAR(50) NOT NULL DEFAULT '0',
	                          `form_name` VARCHAR(50) NOT NULL DEFAULT '0',
	                            PRIMARY KEY (`key_id`)
                              )
                              COLLATE='utf8_general_ci'");
    }
    //вариант mysqli
    /*public function createForm($mysqli, $formID, $formName){
        $test =  mysqli_query($mysqli, "INSERT INTO forms (form_id, form_name) VALUES ('$formID', '$formName')");
        if ($test == true){
            echo "Информация занесена в базу данных 123";
        }else{
            echo "Информация не занесена в базу данных 123";
        }

    }*/
    //вариант pdo
    public function createForm($formID, $formName){
        /*try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo $e->getMessage();
        }*/
        $pdo = self::connect();
        $sql = "INSERT INTO forms (form_id, form_name) VALUES ('$formID', '$formName')";
        $affected_rows = $pdo->exec($sql);
        echo $affected_rows;
    }


    //здесь в переменную $idForm - загоняем все айдишники форм из базы
    //вариант mysqli
   /* public function readID($mysqli, $formName){
        $test = mysqli_query($mysqli, "SELECT form_id FROM forms WHERE form_name = '$formName'");
        while($res = mysqli_fetch_assoc($test)){

            $idForm =  $res['form_id'];
            echo '<pre>';
            var_dump($idForm);
            echo '</pre>';


        }
        return $idForm;
    }*/
    //вариант pdo
    public function readID($formName){
        /*try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo $e->getMessage();
        }*/
        $pdo = self::connect();
        $sql = "SELECT form_id FROM forms WHERE form_name = '$formName'";
        $result = $pdo->query($sql);

        while($res = $result->fetch(PDO::FETCH_ASSOC)){
            $idForm =  $res['form_id'];
        }

        return $idForm;
    }

    //вариант mysqli
    /*public function insertInput($mysqli, $value, $formID){
        $test = mysqli_query($mysqli, "INSERT INTO fields (form_id, field_value) VALUES ('$formID','$value')");
        if ($test == true){
            echo "Информация занесена в базу данных";
        }else{
            echo "Информация не занесена в базу данных";
        }
        echo '<pre>';
        var_dump($value);
        echo '</pre>';

    }*/
    //вариант pdo
    public function insertInput($value, $formID){
        /*try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo $e->getMessage();
        }*/
        $pdo = self::connect();
        $sql = "INSERT INTO fields (form_id, field_value) VALUES ('$formID','$value')";
        $affected_rows = $pdo->exec($sql);
        echo $affected_rows;

    }

    public function updateInput($mysqli, $value, $formID){
        $test = mysqli_query($mysqli, "UPDATE fields SET field_value = '$value' WHERE form_id = '$formID'");
        if ($test == true){
            echo "обновление прошло";
        }else{
            echo "нихуя не обновилось";
        }
    }

    //вариант mysqli
    /*public function showForm($mysqli, $formID){
        $test = mysqli_query($mysqli, "SELECT * FROM fields WHERE form_id ='$formID'");
        while($res = mysqli_fetch_assoc($test)){
            echo $res['field_value'];
        }
    }*/
    //вариант pdo
    public function showForm($formID){
        /*try{
            $pdo = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo $e->getMessage();
        }*/
        $pdo = self::connect();
        $sql = "SELECT * FROM fields WHERE form_id ='$formID'";
        $result = $pdo->query($sql);

       /*while($res = mysqli_fetch_assoc($result)){
            echo $res['field_value'];
        }*/


        while($res = $result->fetch(PDO::FETCH_ASSOC)){
            echo $res['field_value'];
        }
    }


    public function setQuery($value)
    {
        $this->query = "INSERT INTO `fields` (field_value) VALUES (`$value`)";

    }

    /*public function getQuery()
    {
        return $this->query;
    }*/
    public function createField(){
        
    }


}