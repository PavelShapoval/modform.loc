<?php
error_reporting(-1);
//use classes\operationsDb;
//include_once '../classes/operationsDb.php';
function autoloader($class){

    $file = "../classes/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    } else {
        exit('не найден класс');
    }

}
spl_autoload_register('autoloader');


$dbobj = new operationsDb;

$formID = uniqid('form_',false);
$field = [];
if($_POST['field1'] != ''){
    $field[] = $_POST['field1'];
}
if($_POST['field2'] != ''){
    $field[] = $_POST['field2'];
}
if($_POST['field3'] != ''){
    $field[] = $_POST['field3'];
}
//вариант mysqli
/*if($_POST['field0'] != ''){
    $formName = $_POST['field0'];
    $dbobj->createForm($mysqli, $formID, $formName);
}
foreach ($field as $key => $value){
    $dbobj->insertInput($mysqli,$value, $formID);
}*/
//вариант pdo
if($_POST['field0'] != ''){
    $formName = $_POST['field0'];
    $dbobj->createForm($formID, $formName);
}
foreach ($field as $key => $value){
    $dbobj->insertInput($value, $formID);
}
//$dbobj->readID($mysqli);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<hr>
<div class="container">
    <form class="adminform" method="POST" action="">
        <input type="text" name="field0" class="formfield">
        <textarea class="formfield" name="field1"></textarea>
        <textarea class="formfield" name="field2"></textarea>
        <textarea class="formfield" name="field3"></textarea>
        <input class="adminsubmit" type="submit" value="отправить">

    </form>
</div>

</body>
</html>



