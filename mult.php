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
<body>
  <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: "Segoe UI", sans-serif;
  background: url(bg.png)no-repeat;
  background-size: 135%, 135%;
  height: 100vh;
}

#bsend{
  width: 25%;
  height: 3rem;
  text-transform: uppercase;
  background-color: rgb(26, 182, 33);
  font-weight: 650;
  font-size: 20px;
  margin: 15px;
  border-radius: 10px
}
#bsend:hover{
  width: 27%;
  font-size: 22px;
  background-color: rgb(22, 170, 29);
}

.container{
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.main{
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.result{
  text-shadow: 0 0 20px #000, 0 0 30px #000;
  font-weight: 900;
  letter-spacing: 15px;
  line-height: 60px;
  font-size: 70px;
  z-index: 1;
  position: relative;
  color: #fff;
}

.ans{
    color: #fff; 
    font-size: 34px;
    font-weight: 700;  
}

.end{
    color: #fff; 
    font-size: 40px;
    font-weight: 700;
    display: inline-block;
}
#rocket{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(50%);
}

.yes{
    color: rgb(26, 182, 33);
}

.intr{
  color:#fff;
  font-size: 43px;
  font-weight: 700;
  text-shadow: 0 0 20px #000, 0 0 30px #000;
}

input{
  width: 30%;
  height: 3rem;
  font-size: 18px;
  border-radius: 5px;
}
input::placeholder{
  text-align: center;
}

.mid{
  color:#fff;
  font-size: 40px;
  font-weight: 650;
  text-shadow: 0 0 20px #000, 0 0 30px #000;
}

.done{
  position: fixed;
  top: 40%;
  left: 10rem;
  color: #fff;
  font-size: 60px;
  font-weight: 800;
  text-shadow: 0 0 20px #000, 0 0 30px #000;
}

.no{
    color: rgb(216, 23, 23);
}

.name{
    text-shadow: 0 0 20px #000, 0 0 30px #000;
    color: #fff; 
    font-size: 50px;
    font-weight: 750;
    display: inline-block;

}


.container img{
  position: absolute;
  max-width: 10%;
  height: auto;
}

.btn-posnawr {
  color: #f0b514;
  position: relative;
  top: 60%;
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
::-webkit-scrollbar {
            width: 20px;
        }


::-webkit-scrollbar-track {
        background: #00000000;
        border-radius: 5px;

}


::-webkit-scrollbar-thumb {
        background: white;
        border-radius: 15px;
}


::-webkit-scrollbar-thumb:hover {
        background: #555;
}

</style>
<img src="img/plus.png" class="object" data-value="-6" alt="" id="plus">
    <img src="img/minus.png" class="object" data-value="5" alt="" id="minus">
    <img src="img/cross.png" class="object" data-value="-3" alt="" id="cross">
    <img src="img/division.png" class="object" data-value="8" alt="" id="division">
    <img src="img/equal.png" class="object" data-value="2" alt="" id="equal">
  <?php
  $_SESSION['result'] = FALSE;
  if ($_SESSION['loggedin'] != "TRUE") {
    header("Location: login.php");
  }
  ?>
  <a href = "leader.php">
  <img src="img/leader.png" class="object" alt="" id="leader"></a>
  <a href = "profile.php">
  <img src="img/user.png" class="object" alt="" id="pfp"></a>
      <script src = "script.js"></script>
        <?php
        if ($_SESSION['loggedin'] == "TRUE") {
          $name = $_SESSION['name'];
          $time = date("d-m-Y", time());
            $udat = json_decode(file_get_contents('user.json'), true);
            $age = $udat[$name]["Age"];

          $json = json_decode(file_get_contents('ques.json'), true);
          $ne = FALSE;
          $de = FALSE;
          $done = FALSE;
          foreach($json as $key => $value) {
            if ($key == $name) {
              $ne = TRUE;
            }
            foreach($value as $k => $v) {
              if ($k == $time && $key == $name) {
                $de = TRUE;
                if ($v["7"] == "TRUE") {
                  $done = TRUE;
                }
              }
            }
          }
          if ($de == FALSE) {
            if ($age == 3) {
                $m1 = strval(rand(10, 999));
                $m2 = strval(rand(10, 999));
                $m3 = strval(rand(10, 999));
                $m4 = strval(rand(10, 999));
                $m5 = strval(rand(10, 999));
                $m6 = strval(rand(10, 999));
                $d1 = strval(rand(100, 9999));
                $d2 = strval(rand(1, 99));
                $d3 = strval(rand(100, 9999));
                $d4 = strval(rand(1, 99));
                $d5 = strval(rand(100, 9999));
                $d6 = strval(rand(1, 99));
                
            }
            if ($age == 2) {
              $m1 = strval(rand(100, 999));
              $m2 = strval(rand(100, 999));
              $m3 = strval(rand(10, 99));
              $m4 = strval(rand(10, 99));
              $m5 = strval(rand(10, 99));
              $m6 = strval(rand(10, 99));
              $d1 = strval(rand(100, 999));
              $d2 = strval(intval($d1) - rand(1, intval($d1)));
              $d3 = strval(rand(10, 99));
              $d4 = strval(rand(1, 10));
              $d5 = strval(rand(10, 99));
              $d6 = strval(rand(1, 10));    
            }
            if ($age == 1) {
              $m1 = strval(rand(10, 99));
              $m2 = strval(rand(10, 99));
              $m3 = strval(rand(10, 99));
              $m4 = strval(rand(10, 999));
              $m5 = strval(rand(10, 999));
              $m6 = strval(rand(10, 999));
              $d1 = strval(rand(10, 99));
              $d2 = strval(intval($d1) - rand(1, intval($d1)));
              $d3 = strval(rand(100, 999));
              $d4 = strval(rand(1, 99));
              $d5 = strval(rand(100, 999));
              $d6 = strval(intval($d5) - rand(1, intval($d5)));
            }

            $jsd = ["1"=>$m1.",".$m2,"2"=>$m3.",".$m4,"3"=>$m5.",".$m6,"4"=>$d1.",".$d2,"5"=>$d3.",".$d4,"6"=>$d5.",".$d6,"7"=>"FALSE"];
            $json[$name][$time] = $jsd;
            file_put_contents('ques.json', json_encode($json));
          }
          elseif ($de) {
            foreach($json as $key => $value) {
              foreach($value as $k => $v) {
                if ($k == $time && $key == $name) {
                  $m1 = explode(",", $v["1"])[0];
                  $m2 = explode(",", $v["1"])[1];
                  $m3 = explode(",", $v["2"])[0];
                  $m4 = explode(",", $v["2"])[1];
                  $m5 = explode(",", $v["3"])[0];
                  $m6 = explode(",", $v["3"])[1];
                  $d1 = explode(",", $v["4"])[0];
                  $d2 = explode(",", $v["4"])[1];
                  $d3 = explode(",", $v["5"])[0];
                  $d4 = explode(",", $v["5"])[1];
                  $d5 = explode(",", $v["6"])[0];
                  $d6 = explode(",", $v["6"])[1];

                }
              }
          }
          }
          if ($done == FALSE) {
            echo("<center><div class = 'main'><div class = 'intr'>YOUR MULTIPLICATION QUESTIONS FOR TODAY ARE:</div><br>");
            if ($age == 3) {
              echo('
              <form action= multans.php method=post>
              <h2><b><div class = "mid">'.$m1.' X '.$m2.' <br>'.
              "<input name=MM1><br><br>"
              .$m3.' X '.$m4.' <br>'.'
              <input name=MM2><br><br>
              '.$m5.' X '.$m6.'<br>'.
              '<input name=MM3><br><br>'
              .$d1.' ÷ '.$d2.' '.'<br>
              <input name=DD1 placeholder="Quotient"><br><br>
              <input name=DS1 placeholder="Remainder"><br><br>
              '.$d3.' ÷ '.$d4.' '.'<br>
              <input name=DD2 placeholder="Quotient"><br><br>
              <input name=DS2 placeholder="Remainder"><br><br>
              '.$d5.' ÷ '.$d6.' '.'<br>
              <input name=DD3 placeholder="Quotient"><br><br>
              <input name=DS3 placeholder="Remainder"><br><br>
              <button type=submit id="bsend">SUBMIT!</button>
              </b></h2></form></div></div></center>');
            }
            elseif($age == 1) {
              echo('
              <form action= multans.php method=post>
              <h2><b><div class = "mid">'
              .$m1.' + '.$m2.' <br><input name=MM1><br><br>'
              .$m3.' + '.$m4.' <br><input name=MM2><br><br>'
              .$m5.' + '.$m6.'<br><input name=MM3><br><br>'
              .$d1.' - '.$d2.' '.'<br><input name=DD1><br><br>'
              .$d3.' - '.$d4.' '.'<br><input name=DD2><br><br>'
              .$d5.' - '.$d6.' '.'<br><input name=DD3><br>
              <button type=submit id="bsend">SUBMIT!</button>
              </b></h2></form></div></div></center>');
            }
            elseif ($age == 2) {
              echo('
              <form action= multans.php method=post>
              <h2><b><div class = "mid">'
              .$m1.' + '.$m2.' <br><input name=MM1><br><br>'
              .$d1.' - '.$d2.' '.'<br><input name=DD1><br><br>'
              .$m3.' X '.$m4.' <br><input name=MM2><br><br>'
              .$m5.' X '.$m6.'<br><input name=MM3><br><br>'
              .$d3.' ÷ '.$d4.' '.'<br><input name=DD2 placeholder="Quotient"><br><input name=DS2 placeholder="Remainder"><br><br>'
              .$d5.' ÷ '.$d6.' '.'<br><input name=DD3 placeholder="Quotient"><br><input name=DS3 placeholder="Remainder"><br>
              <button type=submit id="bsend">SUBMIT!</button>
              </b></h2></form></div></div></center>');
            }
        }
        else {
          echo("
          <div class = 'done'><center>CONGRATS! YOU HAVE COMPLETED TODAY'S QUESTIONS!</center></div>
          <a class='btn-posnawr' href='result.php'>RESULT<span></span></a>
          ");
        }
      }
        ?>
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