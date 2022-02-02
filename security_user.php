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
$email = $_POST['email'];
$password = empty($_POST['password']) ? '' : password_hash($_POST['password'], PASSWORD_DEFAULT);






$user = get_user_by_email($email);
if(!empty($user) && $email != $_SESSION['user']['email']){
    set_flash_message('danger','Такой емейл уже сушествует');
    redirect_to('users');
}
edit_credentials($user_id, $email, $password);
set_flash_message('success','Данные успешно обновлены!');
redirect_to('users');
?>