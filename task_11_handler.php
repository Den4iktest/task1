<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin;","root","");
$sql = "SELECT * FROM user WHERE email=:email";
$statement = $pdo ->prepare($sql);
$statement -> execute(["email" => $email]);
$users = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($users)){
    $message = "Такой Email уже существует.";
    $_SESSION['danger'] = $message;
    header("Location: /task_11.php");
    exit;
}

$sql = "INSERT INTO user (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute([
    'email' => $email,
    'password' => password_hash($password,PASSWORD_DEFAULT)
]);
header("Location: /task_11.php");

?>
