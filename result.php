<?php
session_start();
$_SESSION['result'] = TRUE;
header("Location: multans.php");
?>