<?php
    session_start();
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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-heart" aria-hiden="true"></span> PHP project</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse text-right">
                    <?php if(!$_SESSION['identity']): ?>
                        <a href="openid/authcontrol.php?act=login" class="btn btn-success">Sign In</a>
                    <?php else: ?>
                        <a href="signout.php" class="btn btn-warning">Sign Out</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1><?php if(isset($_SESSION['identity'])) echo $_SESSION['name']; ?>隨筆系統</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php if(isset($_SESSION['identity'])):?>
                <a href="add.php" class = "btn btn-primary btn-sm">新增</a>
            <?php endif;?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>序號</th>
                            <th>標題</th>
                            <th>建立日期</th>
                            <th>動作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //讀取資料庫
                            $mysqli = new mysqli('localhost','root','','crud');
                            if ($mysqli->connect_errno) {
                                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                            }
                            $mysqli->set_charset("utf8");
                            $sql = "SELECT * FROM todo";
                            $result = $mysqli->query($sql);
                            while($row = $result->fetch_array()) {
                                ?>
                                    <tr>
                                        <td><?=$row['id']?></td>
                                        <td><?=$row['title']?></td>
                                        <td><?=$row['fixtime']?></td>
                                        <td>
                                            <a href="content.php?id=<?=$row['id']?>">查詢</a>
                                            <?php if(isset($_SESSION['identity'])) : ?>
                                                <a href="update.php?id=<?=$row['id']?>">修改</a>
                                                <a href="delete.php?id=<?=$row['id']?>" onclick="return confirm('您確認要刪除該筆資料嗎?');">刪除</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                    
                </table>
            </div>
            <hr>
            <footer>
                <p class="text-center">&copy; Company 2017</p>
            </footer>
        </div>
    </body>
</html>