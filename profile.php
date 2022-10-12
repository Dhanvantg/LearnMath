<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Practice!</title>
    <meta name="description" content="Solve Math Problems Here!">
    <meta name="author" content="Dhanvant.G">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <meta name="page-topic" content="A Place To Learn Basic Maths!" />
    <meta name="topic" content="Practice Multiplication and Division" />

    <meta property="og:title" content="Maths Practice" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Practice Multiplication and Division" />
    <meta property="og:image" itemprop="image" content="social-share.png" />
    <meta property="og:site_name" content="Check my Projects @ http://learnmath.ml." />
    <meta property="og:url" content="http://learnmath.ml" />
    <link rel = "icon" href = "img/logob.png" type = "image/x-icon">
</head>
<body style="overflow:hidden;">
  <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: "Segoe UI", sans-serif;
  background: url(bg.png)no-repeat;
  background-size: cover;
  height: 100vh;
}
.main h2{
    z-index: 1;
    position: absolute;
    top: 5%;
    left: 37%;
    color: #fff;
    text-shadow: 0 0 20px #000, 0 0 30px #000;
    -webkit-text-stroke-width: 3px;
    -webkit-text-stroke-color: black;
    font-size: 90px;
    text-transform: uppercase;
    font-weight: 900;
    letter-spacing: 15px;
    line-height: 60px;
}
.ppl{
    position: absolute;
    left: 15%;
    top: 20%;
    color: #fff;
    font-weight: 700;
    font-size: 45px;
}
#leader {
  position: absolute;
  top: 2%;
  right: 6%;
  width: 3%;
  border: 0px solid #fff;
  border-radius: 10px;
}
#pfp {
  position: absolute;
  top: 2%;
  right: 2%;
  width: 3%;
  border: 0px solid #fff;
  border-radius: 10px;
}
#plus {
  position: absolute;
  top: 15%;
  left: 10%;
  width: 15%;
}
#minus {
  position: absolute;
  bottom: 15%;
  right: 10%;
  width: 15%;
}
#leader:hover{
  width: 3.3%;
}
#pfp:hover{
  width: 3.3%;
}
#cross {
  position: absolute;
  top: 15%;
  right: 10%;
  width: 15%;
}
#division {
  position: absolute;
  bottom: 10%;
  left: 15%;
  width: 15%;
}
#equal {
  position: absolute;
  top: 5%;
  left: 45%;
  width: 15%;
}
.btn-posnawr {
  color: #f0b514;
  position: relative;
  top: 70%;
  left: -2%;
  display: block;
  overflow: hidden;
  width: 100%;
  height: auto;
  max-width: 250px;
  border-radius: 8px;
  margin: 1rem auto;
  font: normal 22px/60px 'proxima-nova', sans-serif;
  text-align: center;
  text-decoration: none;
  border: 2px solid #f0b514;
}
.btn-posnawr span {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-radius: 50%;
  background-color: #f0b514;
  -webkit-transition: width 0.4s ease-in-out, height 0.4s ease-in-out;
  transition: width 0.4s ease-in-out, height 0.4s ease-in-out;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  z-index: -1;
}
.btn-posnawr:hover {
  color: #fff;
  font-weight: 300;
  font-size: 25px;
}
.btn-posnawr:hover span {
  width: 225%;
  height: 562.5px;
}
.btn-posnawr:active {
  background-color: #f0c814;
}
</style>
<a href = "leader.php">
<img src="img/leader.png" class="object" alt="" id="leader"></a>
<a href = "profile.php">
<img src="img/user.png" class="object" alt="" id="pfp"></a>
<img src="img/plus.png" class="object" data-value="-6" alt="" id="plus">
    <img src="img/minus.png" class="object" data-value="5" alt="" id="minus">
    <img src="img/cross.png" class="object" data-value="-3" alt="" id="cross">
    <img src="img/division.png" class="object" data-value="8" alt="" id="division">
    <img src="img/equal.png" class="object" data-value="2" alt="" id="equal">
<div class="main">
    <h2>PROFILE</h2>
</div>
<div class="bax" style="position:absolute; height:40%; width:25%; top: 12rem; left: 35.5%; border-radius: 1.8rem;">
<?php	
  if ($_SESSION['loggedin']){
  $name = $_SESSION['name'];
	$age = $_SESSION['age'];
  if ($age == 1) {
    $age = "KG - 1";
  }
  elseif ($age == 2) {
    $age = "2 - 4";
  }
  elseif ($age == 3) {
    $age = "5 and Above";
  }
  $json = json_decode(file_get_contents('user.json'), true);
  $mail = $json[$name]["Mail"];
	$user = json_decode(file_get_contents('score.json'), true);
	$score = "NIL";
	foreach($user as $key=>$value){
		if ($key == $name) {
			$score = $value['Total'];
		}
  }
	echo("<div class='ppl'>Name:&nbsp;&nbsp;".$name."</div><div class='Grade' style='position:absolute; left:15%; top:40%; color:#fff; font-weight: 700; font-size: 45px;'>Grade:&nbsp;&nbsp;".$age."</div><div class='score' style='position:absolute; left:15%; top: 60%; color: #fff; font-weight: 700; font-size: 45px;'>Score:&nbsp;&nbsp;".$score."</div><div class='mail' style='position:absolute; left:15%; top: 80%; color: #fff; font-weight: 700; font-size: 45px;'>Mail:&nbsp;&nbsp;&nbsp;&nbsp;".$mail."</div></div>");
}
else {
    header("Location: login.php");
}
?>
<a class='btn-posnawr' href='signout.php'>LOG OUT<span></span></a>
<script type="text/javascript">
  (function() {
        const buttons = document.querySelectorAll(".btn-posnawr");

        buttons.forEach(button => {
            ["mouseenter", "mouseout"].forEach(evt => {
            button.addEventListener(evt, e => {
                let parentOffset = button.getBoundingClientRect(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;

                const span = button.getElementsByTagName("span");

                span[0].style.top = relY + "px";
                span[0].style.left = relX + "px";
            });
            });
        });
        })();
    document.addEventListener("mousemove", parallax);
    function parallax(e){
    document.querySelectorAll(".object").forEach(function(move){
  
        var moving_value = move.getAttribute("data-value");
        var x = (e.clientX * moving_value) / 200;
        var y = (e.clientY * moving_value) / 200;
  
        move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
      }
    </script>
</body>
</html>