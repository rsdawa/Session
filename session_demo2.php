
<?php
header("content-type:text/html;charset=utf-8");
session_start(); //使用session前，须先打开session功能
if (!empty($_SESSION['d1'])) {
    echo "<br>d1:" . $_SESSION['d1'];
} else {
    echo "<br>没有d1";
}
if (!empty($_SESSION['d2'])) {
    echo "<br>d2:" . $_SESSION['d2'];
} else {
    echo "<br>没有d2";
}

?>