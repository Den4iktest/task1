<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');

$sql = "SELECT * FROM test_user WHERE email = :email";
$statement = $pdo -> prepare($sql);
$statement -> execute(["email" => $email]);
$user = $statement -> fetch(PDO::FETCH_ASSOC);


if(!empty($user)){
    $_SESSION['danger'] = "<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.";
    header("Location:/page_register.php");
    exit;
}else{
    $_SESSION['success'] = "<strong>Успех!</strong> Вы успешно зарегестрировалтсь.";
    header("Location:/page_register.php");
}

$sql = 'INSERT INTO test_user (email, password) VALUES (:email, :password)';
    $stm = $pdo->prepare($sql);
    $stm->execute([
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

?>