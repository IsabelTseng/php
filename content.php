<?php
    //讀取資料庫，取出文章
     $mysqli = new mysqli('localhost','root','','crud');
    //檢查連線狀態
    if ($mysqli->connect_errno) {
         echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    //設定MySQL為utf8編碼
    $mysqli->set_charset("utf8");
    //查詢資料
    $id = $_GET['id'];
    $sql = "SELECT * FROM todo WHERE id = " . $id;
    $result = $mysqli->query($sql);
    
    //把array排列整齊
    echo '<pre>';
    print_r($result->fetch_array());
    echo '</pre>';
    
    //關閉MySQL資料庫連線
    $mysqli->close();
    //返回首頁
    header("refresh:5; url=http://192.168.1.75/crud");