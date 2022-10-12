<?php
$to = "guglearn18@gmail.com";
$subject = "LearnMath";
$txt = "This mail is sent from learnmath.ml's automated mail sending!";
$headers = "From: dhanvantg@gmail.com";

if (mail($to, $subject, $txt, $headers)) {
    echo("WORKS!");
}
else{
    echo("failure");
}
?>