<?php

class makeForm{
    public function __construct(){

    }
    public function createInput($type, $name, $class, $value){
        echo "<input type='$type' name='$name' class='$class' value='$value'/>";
    }

    public function readFields(){

    }
    public function renderForm(){

    }
}