<?php
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin;","root","");

$sql = "SELECT * FROM task1_9 WHERE text=:text";
$statement = $pdo -> prepare($sql);
$statement -> execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)){
    $message = "Такая запись уже есть в БД,сделайте другую.";
    $_SESSION['danger'] = $message;
    header("Location: /task_10.php");
    exit;
}



$sql = "INSERT INTO task1_9 (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

$message = "Отлично,запись удалась.";
$_SESSION['success'] = $message;


header("Location: /task_10.php");


?>