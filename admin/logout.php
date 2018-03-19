<?php
session_start();
session_destroy();
header('location:http://localhost/SE_Project/admin/index.php');
?>