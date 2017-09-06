<?php
require_once "./session_db_save_base.php";
session_start();
$_SESSION['sess1'] = 2468;
echo "<a href='session_db_save_demo2.php'> goto page2</a>　　　";
echo "<a href='session_destroy_demo3.php'> goto destroy session page2</a>";
