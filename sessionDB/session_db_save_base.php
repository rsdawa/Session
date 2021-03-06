<?php
header("content-type:text/html;charset=utf-8");
/*
session表设计：

create table session(
sess_id varchar(50) primary key,
sess_data text comment 'session数据',
sess_time int comment '时间，用int类型存储为时间戳'
)charset utf8;
 */
//自定义session回收机制

ini_set("session.gc_probability", 1); //随着新访问的回收概率1/2
ini_set("session.gc_divisor", 2);
ini_set("session.gc_maxlifetime", 20); //超过20秒即超时回收
/*
session自定义存储
该函数一次性设定6个函数名，分别代表session运行时要做的6个事情：
开始、结束、读、写、删除、回收
函数名可以自己定，但每个函数名，也都必需要去定义对应函数。
 */
ini_set("session.save_handler", "user");

session_set_save_handler("sessBegin", "sessEnd", "sessRead", "sessWrite", "sessDelete", "sessGc");

$dsn = "mysql:host=localhost;port=3306;dbname=php39";
$opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8");
$pdo = new pdo($dsn, "root", "root", $opt);

function sessBegin()
{
    echo "<p>session 开始...</p>";
}
function sessEnd()
{
    echo "<p>session 结束...</p>";
}

function sessRead($session_id) //系统会自动传入要读取的sessionid

{
    echo "<p>读取sessionID=[$session_id]的数据库内容</p>";
    // $dsn = "mysql:host=localhost;port=3306;dbname=php39";
    // $opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8");
    // $pdo = new pdo($dsn, "root", "root", $opt);

    $data   = "";
    $sql    = "select sess_data from session where sess_id='$session_id'";
    $result = $GLOBALS['pdo']->query($sql); //pdo的结果集
    if ($result) {
        $data = $result->fetchColumn();
    }
    return $data;
}
//将当前session数据，以session_id的名字存入文本文件
//系统会自动传入要写入的sessionid及session值
function sessWrite($session_id, $session_data)
{
    echo "<p>将session内容写入数据库</p>";
    //写session动作在当前程序结束后，所以不能用$GLOBALS全局变量
    $dsn = "mysql:host=localhost;port=3306;dbname=php39";
    $opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8");
    $pdo = new pdo($dsn, "root", "root", $opt);
    $t1  = time();
    $sql = "replace into session (sess_id,sess_data,sess_time)";
    $sql .= " values ('$session_id','$session_data',$t1)";
    //上述replace into语句，如果该session存在就先删除，再插入。如果不存在，就直接插入。
    $pdo->exec($sql);
}
//系统会自动传入要删除的sessionid
function sessDelete($session_id)
{
    echo "<p>删除了session:{$session_id}</p>";
    $sql = "delete from session where sess_id='$session_id'";
    $GLOBALS['pdo']->exec($sql);
}
//自定义回收
//系统会自动传入最大的超时时间
//$maxlifetime其实就是php.ini中的session.gc_lifemaxtime
function sessGc($maxlifetime)
{
    echo "<p style='color:red'>session进行了一次回收。</p>";
    $sql    = "delete from session where now()-sess_time>$maxlifetime";
    $result = $GLOBALS['pdo']->exec($sql);
}
