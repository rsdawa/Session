<?php
require_once "./session_save_base.php";
session_start();
$_SESSION['sess1'] = 2468;
echo "<a href='session_save_demo2.php'> goto page2</a>";
