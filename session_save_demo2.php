<?php
require_once "./session_save_base.php";
session_start();
if (!empty($_SESSION['sess1'])) {
    echo $_SESSION['sess1'];
} else {
    echo "no session:sess1";
}
