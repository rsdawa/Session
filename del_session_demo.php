<?php
session_start();
$_SESSION['s1'] = 's1';
$_SESSION['s2'] = 's2';

//删除单个session值
unset($_SESSION['s1']);
//删除所有session数据
$_SESSION = array();
//不能使用下面的方式
unset($_SESSION); //无法正确删除session值
//销毁session机制，并删除session数据文件,相当于“用户退出”
session_destroy();
