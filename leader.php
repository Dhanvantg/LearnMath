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
    top: 15%;
    left: 30%;
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
    left: 38%;
    top: 30%;
    color: #fff;
    font-weight: 700;
    font-size: 45px;
}
.firs{color:#FFD700;}
.sec{color:#C0C0C0;}
.thir{color:#CD7F32;}
.norm{color:#fff;}
.point{
    position: absolute;
    left:135%;
}
.sno{
    position: absolute;
    left:-10%;
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
#leader:hover{
  width: 3.3%;
}
#pfp:hover{
  width: 3.3%;
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
    <h2>LEADERBOARD</h2>
</div>
<div class="ppl">
<div class = 'norm' style='position: absolute; left: -20%;'>SNo.&emsp;</div> <div class = 'norm' style='position: absolute; left: 35%;'>Name&emsp;</div> <div class = 'norm' style='position: absolute; left: 120%;'>Score&emsp;</div> <br><br>
<?php
  $score = json_decode(file_get_contents('score.json'), true);
  $i = 0;
  $scorea = [];
  foreach($score as $key => $value) {
    $scorea[$key] = $value["Total"];
  }
  arsort($scorea);
  foreach($scorea as $key => $value) {
    if ($i > 10) {
        break;
    }
    if ($i == 0) {
        echo "<div class='firs' style='display: inline-block;'>".strval($i+1).'&emsp;'.$key.' </div><div class="point" style="display: inline-block;">'.$value.'</div><br>';
    }
    elseif ($i == 1) {
        echo "<div class='sec' style='display: inline-block;'>".strval($i+1).'&emsp;'.$key.' </div><div class="point" style="display: inline-block;">'.$value.'</div><br>';
    }
    elseif ($i == 2) {
        echo "<div class='thir' style='display: inline-block;'>".strval($i+1).'&emsp;'.$key.' </div><div class="point" style="display: inline-block;">'.$value.'</div><br>';
    }
    else {
        echo("<div class='norm' style='display: inline-block;'>".strval($i+1).'&emsp;'.$key.' </div><div class="point" style="display: inline-block;">'.$value.'</div><br>');
    }
    $i++;
  }
?>
</div>
<script>
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
    </script>
<script type="text/javascript">
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