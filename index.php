<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$json = json_decode(file_get_contents('ip.json'), true);
$json = ["age" => 2];
foreach($json as $key => $value) {
    if ($key == $ip) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $value;
        $_SESSION['age'] = $value['Age'];
        header("Location: mult.php");
    }
    else {
        $_SESSION["loggedin"] = FALSE;
        header("Location: home.html");
    }
}
?>