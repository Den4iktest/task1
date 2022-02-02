<?php
session_start();
include('functions.php');
if($_SESSION['user']['role'] != 1){
    if($_SESSION['user']['id'] != $_POST['id']){
        set_flash_message('danger','У вас нет доступа к редактированию других пользователей.');
        redirect_to('users');
    }
}
$user_id = $_POST['id'];
$username = $_POST['username'];
$job = $_POST['job']; 
$phone = $_POST['phone']; 
$adress = $_POST['adress']; 

if(isset($user_id)){
    edit($user_id, $username, $job, $phone, $adress);
    set_flash_message('success','Профиль успешно обновлен.');
    redirect_to('users');
}
?>