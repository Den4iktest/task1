<?php
$db = mysqli_connect('localhost','root','','marlin');
if($db == false){
    echo 'no connect!<br>';
    echo mysqli_connect_error();
    exit();
}
$text = $_POST['text'];
if(isset($text)){
    mysqli_query($db,"INSERT INTO `task1_9` (`id`, `text`) VALUES (NULL, '$text')");
    header('Location:/task_9.php');
};
?>