<?php
session_start();

// if counter is not set, set to zero
if(!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// if button is pressed, increment counter
if(isset($_POST['button'])) {
    ++$_SESSION['counter'];
}    

// reset counter
if(isset($_POST['reset'])) {
    $_SESSION['counter'] = 0;
}
header("Location:/task_13.php");
exit;
?>


