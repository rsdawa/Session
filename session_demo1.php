<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
//session会话技术演示
if ($_POST) {
    session_start(); //使用session前，须先打开session功能
    $_SESSION['d1'] = $_POST['data1'];
    $_SESSION['d2'] = $_POST['data2'];
}

?>
<form action="" method='post'>
	<input type="text" name="data1"><br>
	<input type="text" name="data2"><br>
	<input type="submit" value='提交'>
</form>

</body>
</html>
