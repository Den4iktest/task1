<?php
session_start();
include('functions.php');

$email = $_POST['email'];
$password = $_POST['password'];


$user = get_user_by_email($email);

login($email, $password);
redirect_to('users');

?>