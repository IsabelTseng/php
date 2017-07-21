<?php
//啟動session
session_start();

//載入openid library
include "commonclass.php";

//建立openid物件
$obj = new YLC_OID_BASE();

//檢查錯誤
if (empty($_GET['act'])) {
	$obj->displayError("無法連結本縣單一認證系統");
}

//連線登入
$openid= "http://openid.ylc.edu.tw";		//本縣OpenID URL
$obj->beginAuth($openid);
?>
