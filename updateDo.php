<?php
session_start();
if(isset($_SESSION['identity'])){
    //讀取資料庫
     $mysqli = new mysqli('localhost','root','','crud');
    if ($mysqli->connect_errno) {
         echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $mysqli->set_charset("utf8");
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE todo SET title='$title', content='$content' WHERE id=" . $id;
    $mysqli->query($sql);
    $mysqli->close();
}
header("refresh:1; url=http://192.168.1.75/crud");