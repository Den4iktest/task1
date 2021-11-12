<?php
$db = mysqli_connect('localhost','root','','marlin');
    if($db == false){
        echo 'no connect!<br>';
        echo mysqli_connect_error();
        exit();
    }
?>

<?php 
$text = $_POST['text'];
// echo $text;
$query = mysqli_query($db,"SELECT * FROM `task1_9`");
// $result = mysqli_fetch_assoc($query);
// echo $result['text'];
// while($result['text']){
//     echo $result['text']
// }
foreach($query as $examination){
    if($examination['text'] == $text){
        // mysqli_query($db,"INSERT INTO `task1_9` (`id`, `text`) VALUES (NULL, '$text')");
        // echo "Нету совпадений";
        echo "Такой текст уже есть";
    }else {
        echo "Такой текст уже есть";
    }
    }
                    
                   
?>