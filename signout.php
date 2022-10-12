<?php
    session_start();
    $name = $_SESSION['name'];
    $json1 = json_decode(file_get_contents('user.json'), true);
    $ip = $json1[$name]["IP"];
    $json = json_decode(file_get_contents('ip.json'), true);
    unset($json[$ip]);
    header("Location: home.html");
?>