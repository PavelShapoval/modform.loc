<?php
error_reporting(-1);
//use classes\operationsDb;
//include_once '../classes/operationsDb.php';
//временно подрубил подключение к базе пока на пдо не переписано



function autoloader($class){
    $file = "../classes/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    } else {
        exit('не найден класс');
    }
}
spl_autoload_register('autoloader');
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
<?php


$show = new operationsDb();


//вывод выборки форм
echo "<form method='post' action=''>";
$formName = $_POST['formname'];
echo "<select name='formname'>";
echo "<option value='форма-1' selected='selected'>форма-1</option>";
echo "<option value='форма-2'>форма-2</option>";
echo "<option value='форма тест'>форма тест</option>";
echo "</select>";

echo "<input type='submit' value='выбрать'>";
echo "</form><br>";



//вывод формы
$formID = $show->readID($formName);

echo "<form id=".$formID.">";
$show->showForm($formID);
echo '</form>';




?>
</div>

</body>
</html>


