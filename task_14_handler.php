<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin","root","");

$sql = "SELECT * FROM user WHERE email=:email and password=:password";

$statement = $pdo -> prepare($sql);
$statement -> execute([
    "email" => $email,
    "password" =>$password
    // "password" => password_verify($password, $hash)
    // с хешом не понял как сделать правильно.
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($user)){
    $_SESSION['user'] = [
        "id" => $user['id'],
        "email" => $user['email'],
        "password" => $user['password']
    ];
    $message = "exit";
    $_SESSION['exit'] = $message;
    header("Location:/task_14.php");
    exit;
}else{
    $message = "Введены не правельные данные.";
    $_SESSION['danger'] = $message;
    header("Location:/task_14.php");
    exit;
}





// if(isset($_GET['exit']))
// {
//     session_destroy();
//     // header('Location:/task_11.php');  
//     header("Location: /");
//     exit;
// }
// ?>

// <a href="?exit">Exit</a>


