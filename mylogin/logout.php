<?php
session_start();
include 'config.php';

unset($_SESSION[WP . 'checklogin']);
unset($_SESSION[WP . 'id']);
unset($_SESSION[WP . 'fullname']);

header("location:{$base_url}/login.php");
?>