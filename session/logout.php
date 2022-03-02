<?php
session_start();
session_destroy();
header('location:login.php');
// echo"<script> Location.href'/session/login.php'; </script>";
?>