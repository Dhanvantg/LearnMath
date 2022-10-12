<html>
    <head>
        <title>RESULTS!</title>
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
  background-size: cover;
  height: 100vh;
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
  top: 50%;
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
    background-color: #ffffff29;
    border-radius: 15px;
}

.end{
    color: #fff; 
    font-size: 40px;
    font-weight: 700;
    display: inline-block;
}

.yes{
    color: rgb(26, 182, 33);
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


.container img{
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  object-fit: contain;
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


@media (max-width:800px){
  .container h2{
    font-size: 60px;
    letter-spacing: 19px;
    line-height: 35px;
  }

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
      <script type="text/javascript">
      document.addEventListener("mousemove", parallax);
      function parallax(e){
        document.querySelectorAll(".object").forEach(function(move){
  
          var moving_value = move.getAttribute("data-value");
          var x = (e.clientX * moving_value) / 250;
          var y = (e.clientY * moving_value) / 250;
  
          move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
      }
      </script>
        <?php 
        session_start();
        if ($_SESSION['loggedin']) {
          $age = $_SESSION['age'];
          $json = json_decode(file_get_contents('ques.json'), true);
          $time = date("d-m-Y", time());
          $name = $_SESSION['name'];
          $json2 = json_decode(file_get_contents('user.json'), true);
          $mail = $json2[$name]["Mail"];
          $status = TRUE;
          if ($_SESSION['result']){
            $json1 = json_decode(file_get_contents('ans.json'), true);
            $status = FALSE;
            foreach($json1 as $key => $value) {
              foreach($value as $k => $v) {
                if ($k == $time && $key == $name) {
                  $mm1 = $v["1"];
                  $mm2 = $v["2"];
                  $mm3 = $v["3"];
                  $dd1 = $v["4"];
                  $dd2 = $v["5"];
                  $dd3 = $v["6"];
                if ($age >= 2) {
                  $ds1 = $v["7"];
                  $ds2 = $v["8"];
                }
                if ($age == 3) {
                  $ds3 = $v["9"];
                  }
                }
              }
            }
          }

          else {
          $mm1 = intval($_POST['MM1']);
          $mm2 = intval($_POST['MM2']);
          $mm3 = intval($_POST['MM3']);
          $dd1 = intval($_POST['DD1']);
          $dd2 = intval($_POST['DD2']);
          $dd3 = intval($_POST['DD3']);
          
          if ($age == 2) {
            $ds1 = intval($_POST['DS1']);
            $ds2 = intval($_POST['DS1']);
          }
          if ($age == 3) {
            $ds1 = intval($_POST['DS1']);
            $ds2 = intval($_POST['DS2']);
            $ds3 = intval($_POST['DS3']);
          }
        }

          foreach($json as $key => $value) {
              foreach($value as $k => $v) {
                if ($k == $time && $key == $name) {
                  $mq1 = explode(",", $v["1"])[0];
                  $mq2 = explode(",", $v["1"])[1];
                  $mq3 = explode(",", $v["2"])[0];
                  $mq4 = explode(",", $v["2"])[1];
                  $mq5 = explode(",", $v["3"])[0];
                  $mq6 = explode(",", $v["3"])[1];
                  $dq1 = explode(",", $v["4"])[0];
                  $dq2 = explode(",", $v["4"])[1];
                  $dq3 = explode(",", $v["5"])[0];
                  $dq4 = explode(",", $v["5"])[1];
                  $dq5 = explode(",", $v["6"])[0];
                  $dq6 = explode(",", $v["6"])[1];

                }
              }
          }

          $arr1 = array(
              "m1",
              "m1",
              "m2",
              "m2",
              "m3",
              "m3",
              "d1",
              "d2",
              "d3",
              "d4",
              "d5",
              "d6",
          );

          function divi($q1, $q2, $q3, $q4) {
              if (floor($q1/$q2) == $q3){
                  return("<div class = 'yes'>".strval($q1)." ÷ ".strval($q2)." = ".strval($q3)." (Q)           ✔️<br></div>");
              }else{
                  global $arr1;
                  $key = array_search($q4, $arr1, True);
                  unset($arr1[$key]);
                  return("<div class = 'no'>".strval($q1)." ÷ ".strval($q2)." = ".strval($q3)." (Q)           ❌<typo>      ".strval(floor($q1/$q2))."</typo><br></div>");
          }}
          function addi($q1, $q2, $q3, $q4) {
            if (floor($q1+$q2) == $q3){
                return("<div class = 'yes'>".strval($q1)." + ".strval($q2)." = ".strval($q3)."            ✔️<br></div>");
            }else{
                global $arr1;
                $key = array_search($q4, $arr1, True);
                unset($arr1[$key]);
                return("<div class = 'no'>".strval($q1)." + ".strval($q2)." = ".strval($q3)."            ❌<typo>      ".strval($q1+$q2)."</typo><br></div>");
          }}
          function subt($q1, $q2, $q3, $q4, $q5) {
            if ($q1-$q2 == $q3){
                return("<div class = 'yes'>".strval($q1)." - ".strval($q2)." = ".strval($q3)."            ✔️<br></div>");
            }else{
                global $arr1;
                $key = array_search($q4, $arr1, True);
                unset($arr1[$key]);
                $key = array_search($q5, $arr1, True);
                unset($arr1[$key]);
                return("<div class = 'no'>".strval($q1)." - ".strval($q2)." = ".strval($q3)."            ❌<typo>      ".strval($q1-$q2)."</typo><br></div>");
          }}
          function mult($q1, $q2, $q3, $q4) {
              if ($q1*$q2 == $q3){
                  
                  return("<div class = 'yes'>".strval($q1)." X ".strval($q2)." = ".strval($q3)."          ✔️<br></div>");
                  
              }else{
                  global $arr1;
                  $key = array_search($q4, $arr1, True);
                  unset($arr1[$key]);
                  $key = array_search($q4, $arr1, True);
                  unset($arr1[$key]);
                  return("<div class = 'no'>".strval($q1)." X ".strval($q2)." = ".strval($q3)."          ❌<typo>      ".strval($q1*$q2)."</typo><br></div>");
          }}
          
          function rem($q1, $q2, $q3, $q4) {
              if ($q1%$q2 == $q3){
                  
                  return("<div class = 'yes'>".strval($q1)." ÷ ".strval($q2)." = ".strval($q3)." (R)           ✔️<br></div>");
                  
              }else{
                  global $arr1;
                  $key = array_search($q4, $arr1, True);
                  unset($arr1[$key]);
                  return("<div class = 'no'>".strval($q1)." ÷ ".strval($q2)." = ".strval($q3)." (R)           ❌<typo>      ".strval($q1%$q2)."</typo><br></div>");
          }}
          
          echo ('<div class = "main"><div class = "result"><center>RESULT</center><br></div>');
          if ($age == 3){
            echo("<div class = 'ans'><center>".mult($mq1, $mq2, $mm1, "m1").mult($mq3, $mq4, $mm2, "m2").mult($mq5, $mq6, $mm3, "m3"));
            echo(divi($dq1, $dq2, $dd1, "d1").rem($dq1, $dq2, $ds1, "d2").divi($dq3, $dq4, $dd2, "d3").rem($dq3, $dq4, $ds2, "d4").divi($dq5, $dq6, $dd3, "d5").rem($dq5, $dq6, $ds3, "d6"));
            $jsd = ["1"=>$mm1,"2"=>$mm2,"3"=>$mm3,"4"=>$dd1,"5"=>$dd2,"6"=>$dd3,"7"=>$ds1,"8"=>$ds2,"9"=>$ds3];
          }
          elseif ($age == 2){
            echo("<div class = 'ans'><center>".addi($mq1, $mq2, $mm1, "m1").subt($dq1, $dq2, $dd1, "d1", "d2").mult($mq3, $mq4, $mm2, "m3"));
            echo(mult($mq5, $mq6, $mm3, "m2").divi($dq3, $dq4, $dd2, "d3").rem($dq3, $dq4, $ds1, "d4").divi($dq5, $dq6, $dd3, "d5").rem($dq5, $dq6, $ds2, "d6"));
            $jsd = ["1"=>$mm1,"2"=>$mm2,"3"=>$mm3,"4"=>$dd1,"5"=>$dd2,"6"=>$dd3,"7"=>$ds1,"8"=>$ds2];
          }
          elseif ($age == 1){
            echo("<div class = 'ans'><center>".addi($mq1, $mq2, $mm1, "m1").addi($mq3, $mq4, $mm2, "m2").addi($mq5, $mq6, $mm3, "m3"));
            echo(subt($dq1, $dq2, $dd1, "d1", "d2").subt($dq3, $dq4, $dd2, "d3", "d4").subt($dq5, $dq6, $dd3, "d5", "d6"));
            $jsd = ["1"=>$mm1,"2"=>$mm2,"3"=>$mm3,"4"=>$dd1,"5"=>$dd2,"6"=>$dd3];
          }
          $json2 = json_decode(file_get_contents('ans.json'), true);
          $json2[$name][$time] = $jsd;
          file_put_contents('ans.json', json_encode($json2));
          if (count($arr1) >= 6) {
              $cl = "<div class = 'yes'>";
          }
          else {
              $cl = "<div class = 'no'>";
          }
          echo("</div><div class = 'name'><br>".$name."</div><div class = 'end'>, You Scored <div class = 'name'>".$cl.strval(count($arr1))."</div></div> Out Of <div class = 'name'>12</div>!</div></center>");

          $score = count($arr1);
          $json = json_decode(file_get_contents('score.json'), true);
          $nse = FALSE;
          foreach($json as $ke => $va) {
              if ($ke == $name) {
                  $nse = TRUE;
              }
          }
          if ($nse == FALSE) {
          $json[$name] = ["Total" => strval($score), $time => strval($score)];
          }
          else {
              $tot = null;
              foreach ($json as $key => $val) {
                  foreach ($val as $k => $v) {
                      if ($k == "Total"){}
                      else {
                          $tot += intval($v);
                      }
                  }
              }
              $json[$name] = ["Total" => strval($tot), $time => strval($score)];
          }
          file_put_contents('score.json', json_encode($json));

          $json = json_decode(file_get_contents('ques.json'), true);
          $json[$name][$time]["7"] = "TRUE";
          file_put_contents('ques.json', json_encode($json));
          if ($status) {
            $subject = "LearnMath Assessment Report";
            $txt = "Hello there!!  ^-^\n".$name." has successfully completed today's assessment with a score of ".$score."/12!";
            $headers = 'From: Dhanvant<dhanvantg@gmail.com>';
            mail($mail, $subject, $txt, $headers);
            $status = FALSE;
          }
    }
    else {
        header("Location: login.php");
    }

        ?>
        
    </body>
    </html>