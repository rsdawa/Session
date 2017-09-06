<?php
header("content-type:text/html;charset=utf-8");
//自定义session回收
ini_set("session.gc_probability", 1);
ini_set("session.gc_divisor", 2);
/*
session自定义存储
该函数一次性设定6个函数名，分别代表session运行时要做的6个事情：
开始、结束、读、写、删除、回收
函数名可以自己定，但每个函数名，也都必需要去定义对应函数。
 */
ini_set("session.save_handler", "user");

session_set_save_handler("sessBegin", "sessEnd", "sessRead", "sessWrite", "sessDelete", "sessGc");

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
    echo "<p>读取session文件内容</p>";
    $file = "./sess_$session_id.txt";
    if (file_exists($file)) {
        $data = file_get_contents($file);
    } else {
        $data = "";
    }

    return $data;
}
//将当前session数据，以session_id的名字存入文本文件
//系统会自动传入要写入的sessionid及session值
function sessWrite($session_id, $session_data)
{
    echo "<p>将session内容写入文件</p>";
    $file = __DIR__ . "\\sess_$session_id.txt";
    file_put_contents($file, $session_data);
}
//系统会自动传入要删除的sessionid
function sessDelete($session_id)
{
    echo "<p>删除了session:{$session_id}";
}
//自定义回收
//系统会自动传入最大的超时时间
function sessGc($maxlifetime)
{
    echo "<p style='color:red'>session进行了一次回收。</p>";
}
