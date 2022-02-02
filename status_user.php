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
$status = $_POST['status'];
set_status($user_id, $status);
set_flash_message('success','Статус обновлен.');
redirect_to('users');
?>