<?php
header("content-type:text/html;charset=utf-8");
/*
1.设置cookie
setcookie('cookie名','cookie值');
2.读取cookie
$v1 = $_COOKIE['cookie名1']; //$_COOKIE是一个超全局数组变量
3.cookie细化
　setcookie($name,$value,$time,$path,$domain,$isHTTPS,$isHTTP)
$name:cookie名
$value:cookie值
$time:cookie有效时间,可以设置为任何时间点（时间戳）
　time()+24*3600 (默认为0,浏览器关闭时失效)
$path:cookie在网站哪个目录下有效:
　如：setcookie('c1','value1',0,'/dir1');
　通常，默认值为设置cookie的文件所在的目录及其子目录。如果需要全站对该cookie有效，则需要，
　如：setcookie('c2','value2',0,'/');
$domain:设置cookie有效的域名(默认为当前域名)
　setcookie('c1','value1',0,'/dir1','www.baidu.com');
$isHTTPs:是否仅在https协议下有效。(默认为false)
　setcookie('c1','value1',0,'/dir1','www.baidu.com',true);
$isHTTP:是否仅在http协议下有效。(默认为false)
　setcookie('c1','value1',0,'/dir1','www.baidu.com',false,true);
　cookie可以通过php获取，也可以通过js获取。设置$isHTTP=true后，则无法用js获取cookie的值。

 */

//设置cookie有效时间
setcookie('cookie1', '值1');
setcookie('cookie2', '值2', time() + 60); //60秒后失效
?>
<b>cookie已设置,</b>
<a href="cookie_demo2.php">显示cookie</a>

<hr>
<b>js和php获取cookie</b><br>
<?php
setcookie('c1', 'value1', 0, '/', 'localhost', false, false);
setcookie('c2', 'value2', 0, '/', 'localhost', false, true);

?>