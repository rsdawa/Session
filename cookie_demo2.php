
<?php
header("content-type:text/html;charset=utf-8");
if (!empty($_COOKIE['cookie1'])) {
    echo "<br>cookie1:" . $_COOKIE['cookie1'];
} else {
    echo "<br>没有cookie1";
}
if (!empty($_COOKIE['cookie2'])) {
    echo "<br>cookie2:" . $_COOKIE['cookie2'];
} else {
    echo "<br>没有cookie2";
}

echo "<hr>";
echo "php和js获取cookie对比：<br>";
echo "<br>php获取c1:" . $_COOKIE['c1'];
echo "<br>php获取c2:" . $_COOKIE['c2'];
echo "<br>js获取c1 c2:"
;?>
<script>
	var cookie=document.cookie;
	document.write ("<br>"+cookie);//只能输出c1
</script>