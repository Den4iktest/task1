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



 

// if($email){
//     $sql = "INSERT INTO test_user (email, password) VALUES (:email, :password)";
//     $statement = $pdo -> prepare($sql);
//     $statement -> execute([
//         "email" => $email,
//         "password" => password_hash($password,PASSWORD_DEFAULT)
//         // "username" => $name
//         // "job" => $job,
//         // "avatar" => $file,
//         // "phone" => $phone,
//         // "adress" => $adress,
//         // "status" => $status
//     ]);
//     echo "zapisb dobavlena";
// }else {
//     echo "chtoto ne tak";
// }

// echo "<br>";
// echo "<pre>";
//     var_dump($sql);
// echo "</pre>";
// echo "<br>";
// echo "<br>";
// echo "<pre>";
//     var_dump($pdo);
// echo "</pre>";
// echo "<br>";
// $pdo = new PDO("mysql:host=localhost;dbname=marlin;","root","");
// $sql = "SELECT * FROM pipec WHERE email=:email";
// $statement = $pdo ->prepare($sql);
// $statement -> execute(["email" => $email]);
// $users = $statement->fetch(PDO::FETCH_ASSOC);

// if(!empty($users)){
//     $message = "Такой Email уже существует.";
//     $_SESSION['danger'] = $message;
//     // header("Location: /task_11.php");
//     exit;
// }
// $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
// $id = 17;
// $sql = "SELECT * FROM users WHERE id = :id";
// $statement = $pdo -> prepare($sql);
// $statement -> execute(["id" => $id]);
// $user = $statement -> fetch(PDO::FETCH_ASSOC);

// echo "<br>";
// echo "<pre>";
//     var_dump($user);
// echo "</pre>";
// echo "<br>";


?>