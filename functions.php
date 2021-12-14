<?php
session_start();

function get_user_by_email($email){
    // 1. Подключение к бд
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');

    // 2. Создание запроса
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo -> prepare($sql);

    // 3. Выполнение запроса
    $statement -> execute(['email' => $email]);

    // 4. Возварашение результата.Вернет: массив либо false
    return $statement -> fetch(PDO::FETCH_ASSOC);
}

function login($email, $password){
    $user = get_user_by_email($email);
    if(empty($user)){
        set_flash_message('erorr','Логин или пароль введены неверно.');
        header("Location:/page_login.php");
        exit;
    }
    if(!password_verify($password,$user['password'])){
        set_flash_message('erorr','Логин или пароль введены неверно.');
        header("Location:/page_login.php");
        exit;
    }
    $_SESSION['user'] = $user;
    // header("Location:/page_profile.php");
    // exit;
    return true;
}

function set_flash_message($name,$message){
    $_SESSION[$name] = $message;
}

function display_flash_message($name){
    if ($_SESSION[$name]) {
        echo $_SESSION[$name];
        unset($_SESSION[$name]);
    }
}
function redirect_to($path)
{
    header('Location: /' . $path . '.php');
    exit;
}

function is_not_logged_in(): bool
{
    if (!isset($_SESSION['user'])) {
        return true;
    }

    return false;
}

function is_not_loogged_in(){
    if(!isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

function get_users()
{
     $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
     $sql = "SELECT * FROM users";
     $statement = $pdo -> prepare($sql);
     $statement -> execute();
 
     return $statement -> fetchAll(PDO::FETCH_ASSOC);
}

function add_user($email, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "INSERT INTO test_user (email, password) VALUES (:email, :password)";
    $statement = $pdo -> prepare($sql);
    $statement -> execute(['email' => $email, 'password' => password_hash($password,PASSWORD_DEFAULT)]);
}
?>