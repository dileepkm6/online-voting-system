<?php
session_start();
session_destroy();
header('location:http://localhost/online-voting-system/admin/index.php');
?>