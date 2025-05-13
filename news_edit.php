<?php
$id=$_GET["id"];
$title = $_POST["title"];
$text = $_POST["text"];
$img_url = $_FILES["imagew"]["name"];
$img = "images/". $img_url;

$link=mysqli_connect("localhost","root","","onenewsdb");
move_uploaded_file($_FILES["imagew"]["tmp_name"], $img);
$result=mysqli_query($link,"UPDATE `news` SET `title`='$title',`text`='$text',`imageurl`='$img' WHERE `id` = $id");
mysqli_close($link);

echo($img);




?>