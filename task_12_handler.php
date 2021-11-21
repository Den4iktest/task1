<?php
session_start();

$text = $_POST['text'];

if(!empty($text)){
    $massege = $text;
    $_SESSION['info'] = $massege;
    header("Location: /task_12.php");
    exit;
}



?>