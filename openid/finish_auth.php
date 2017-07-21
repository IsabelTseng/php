<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="utf-8">
	<title>OpenID登入（範例）</title>
</head>
<body>
<?php //1~7行可刪
//啟動session
session_start();

//載入openid library
include "commonclass.php";

//建立openid物件
$obj = new YLC_OID_BASE();

//檢查認證結果（認證成功即回傳帳號資料）
if ($obj->getResponseStatus($msg) > 0) {
  //取得認證成功後帶回的帳號資料(陣列)
  $result = $obj->getResponseArray();
  
  //顯示帳號資料($result)
  echo '<pre>';
  print_r($result);
  echo '</pre>';

  //session
  $_SESSION['identity'] = $result['identity'];
  $_SESSION['email'] = $result['email'];
  $_SESSION['name'] = $result['fullname'];
  $_SESSION['school'] = $result['schoolname'];
  $_SESSION['schoolid'] = $result['id'];

  //去首頁
  header("refresh:2; url=http://192.168.1.75/crud");

} else {
	echo $msg;
}
?>
</body>
</html>