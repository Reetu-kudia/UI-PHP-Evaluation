<?php
session_start();
session_destroy();
include 'db.php';
header('Locataion:login.php');
?>