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
$image = $_FILES;

if(isset($user_id)){
    upload_avatar($user_id, $image);
    set_flash_message('success','Аватар успешно обновлен.');
}else{
    set_flash_message('danger','Аватар не загружен.');
 
}
redirect_to('users');



?>