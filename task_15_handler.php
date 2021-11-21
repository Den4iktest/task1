<?php
// echo "<pre>";
// var_dump($_FILES['image']);
// echo "</pre>";

$time = time();
$name = $time."".$_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

// функция: move_uploaded_file() переместить загруженный файл,принимает 2-параметра( 1 - где находится, 2 - куда переместить)
move_uploaded_file($tmp_name, "uploads/.$name");
$image = $name;
// echo isset($image);
// if(isset($name) == "null"){
//     echo $image;
// }
echo $name;

$pdo = new PDO("mysql:host=localhost;dbname=marlin;","root","");
$sql = "INSERT INTO images (image) VALUES (:image)";
$statement = $pdo->prepare($sql);
$statement->execute(['image' =>$image]);
?>