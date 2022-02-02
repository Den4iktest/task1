<?php
session_start();
include('functions.php');
if($_SESSION['user']['role'] != 1){
    if($_SESSION['user']['id'] != $_GET['id']){
        set_flash_message('danger','У вас нет доступа к удалению других пользователей.');
        redirect_to('users');
    }
    $user = get_user_by_id($_GET['id']);
    delete_user($_GET['id'], $user['avatar']);
    redirect_to('exit');
}else{
    $user = get_user_by_id($_GET['id']);
    delete_user($_GET['id'], $user['avatar']);
    set_flash_message('success','Пользователь успешно удалён.');
    redirect_to('users');
}

?>