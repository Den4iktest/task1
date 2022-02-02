<?php
// session_start();

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
function redirect_to($path){
    header('Location: /' . $path . '.php');
    exit;
}

function is_not_logged_in(){
    if (!isset($_SESSION['user'])) {
        return true;
    }

    return false;
}


function get_users(){
     $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
     $sql = "SELECT * FROM users";
     $statement = $pdo -> prepare($sql);
     $statement -> execute();
 
     return $statement -> fetchAll(PDO::FETCH_ASSOC);
}

function add_user($email, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo -> prepare($sql);
    $statement -> execute(['email' => $email, 'password' => password_hash($password,PASSWORD_DEFAULT)]);
    
    return $pdo->lastInsertId();
}
function edit($user_id, $username, $job, $phone, $adress){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "UPDATE users SET username=:username, job=:job, phone=:phone, adress=:adress WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'id' => $user_id,
        'username' => $username,
        'job' => $job,
        'phone' => $phone,
        'adress' => $adress
    ]);
    return boolean;
}
function set_status($user_id, $status){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "UPDATE users SET status=:status WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'id' => $user_id,
        'status' => $status
    ]);
}
function upload_avatar($user_id, $image){
    $image = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;
    $to = "img/demo/avatars/" . $filename;
    move_uploaded_file($image, $to);
    if(isset($image)){
        $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
        $sql = "UPDATE users SET avatar=:avatar WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([
            'id' => $user_id,
            'avatar' => $filename
        ]);
    }
}
function add_social_links($user_id, $telegram, $instagram, $vk){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "UPDATE users SET vk=:vk, telegram=:telegram, instagram=:instagram WHERE id=:id";
    // $sql = "INSERT INTO users (vk, telegram, instagram) VALUES (:vk, :telegram, :instagram)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'id' => $user_id,
        'vk' => $vk,
        'telegram' => $telegram,
        'instagram' => $instagram
    ]);
}
function get_user_by_id($id_user){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'id' => $id_user
    ]);
    return $stmt -> fetch(PDO::FETCH_ASSOC);
}
function is_author($logged_user_id, $edit_user_id){
    
}
function edit_credentials($user_id, $email, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "UPDATE users SET email=:email, password=:password WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'id' => $user_id,
        'email' => $email,
        'password' => $password
    ]);
    return boolean;
}

function delete_user($user_id, $avatar){
    $path = "img/demo/avatars/" . $avatar;
    if(file_exists($path) == true){
        unlink($path);
    }
    $pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
    $sql = "DELETE FROM users WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindValue("id" , $user_id);
    $stmt -> execute();
}
?>