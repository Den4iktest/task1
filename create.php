<?php
session_start();
include('functions.php');

$pdo = new PDO("mysql:host=localhost;dbname=marlin;charset=utf8",'root','');


$username = $_POST['name'];
$job = $_POST['job'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status'];
$image = $_POST['file'];
$telegram = $_POST['telegram'];
$instagram = $_POST['instagram'];
$vk = $_POST['vk'];


if(get_user_by_email($email)){
    set_flash_message('danger','Такой email уже зарегестрирован');  
    redirect_to('create_user');
}else {
    $user_id = add_user($email, $password);
    if(isset($user_id)){
        edit($user_id, $username, $job, $phone, $adress);
        set_status($user_id, $status);
        upload_avatar($user_id, $image);
        add_social_links($user_id, $telegram, $instagram, $vk);
    }
    set_flash_message('success','Пользователь успешно добавлен');
redirect_to('create_user');
} 


?>