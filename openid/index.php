<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="utf-8">
	<title>OpenID登入（範例）</title>
</head>
<body>
	<h3>請使用本縣單一認證系統帳密登入</h3>
	<hr>
	<p style="font-size:11pt;color: #555;">
		- 原始範例程式下載自<a href="http://note.tc.edu.tw/789.html">台中市-精讚部落格</a><br />
		- 本範例配合雲林縣單一認證系統OpenID使用<br />
		- 認證完畢後可取回資料為 <sup>1</sup>姓名 <sup>2</sup>郵件 <sup>3</sup>鄉填市 <sup>4</sup>學校名 <sup>5</sup>學校類型 <sup>6</sup>身分別 <sup>7</sup>行政職務 <sup>8</sup>學校代碼
	</p>
	<p><a href="authcontrol.php?act=login">請登入</a></p>
	<div style="color:#CC7300; font-size:15px;"><?php if(!empty($message)) echo $message; ?></div>
</body>
</html>