<?php
    session_start();
    if(isset($_SESSION['identity'])):
?>
<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/jumbotron.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
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
        $row=$result->fetch_row();
        
        //關閉MySQL資料庫連線
        $mysqli->close();
    ?>
        <form method="post" action="updateDo.php">
            <input type="hidden" name="id" value="<?=$id?>">
            <table class="table table-bordered">
                <tr>
                    <td>文章標題</td>
                    <td><input type="text" name="title" value="<?=$row[1]?>" size="90" placeholder="輸入標題"></td>
                </tr>
                <tr>
                    <td>文章內容</td>
                    <td><textarea rows="10" cols="100" name="content" placeholder="輸入內容"><?=$row[2]?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="send" value="送出" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php 
    else:
        header("refresh:1; url=http://192.168.1.75/crud");
    endif;
?>