<?php
session_start();
include('functions.php');

$pdo = new PDO("mysql:host=localhost;dbname=marlin;charset=utf8",'root','');


// $name = $_POST['name'];
// $job = $_POST['job'];
// $phone = $_POST['phone'];
// $adress = $_POST['adress'];
$email = $_POST['email'];
$password = $_POST['password'];
// $status = $_POST['status'];
// $file = $_POST['file'];
// redirect_to('create_user');


if(get_user_by_email($email)){
    set_flash_message('danger','Такой email уже зарегестрирован');  
    redirect_to('create_user');
}  else{
$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute([
    'email' => $email,
    'password' => password_hash($password,PASSWORD_DEFAULT)
]);
set_flash_message('success','Пользователь успешно добавлен');
redirect_to('create_user');
}

?>