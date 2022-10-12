<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo("<script>
        window.onload = function() {
            var pwd = document.getElementById('pwd');
            pwd.style.borderColor = 'black';
            pwd.placeholder = 'Password';
            var user = document.getElementById('user');
            user.style.borderColor = 'black';
            user.placeholder = 'Username';
        };
        </script>");
    $user = $_POST["user"];
    $pwd =  $_POST["pwd"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $cur = json_decode(file_get_contents('user.json'), true);
    $cur2 = json_decode(file_get_contents('ip.json'), true);
    if (array_key_exists($user, $cur)) {
        if ($pwd == $cur[$user]["Password"]) {
            $cur2[$ip] = $user;
            $cur[$user]["IP"] = $ip;

            file_put_contents('user.json', json_encode($cur));
            file_put_contents('ip.json', json_encode($cur2));
            $_SESSION['loggedin'] = "TRUE";
            echo($_SESSION['loggedin']);
            $_SESSION['name'] = $user;
            $_SESSION['age'] = $cur[$user]["Age"];
            header("Location: mult.php");
            exit();
        }
        else {
            echo("<script>
            window.onload = function() {
                pwd.style.borderColor = 'red';
                pwd.placeholder = 'Invalid Password!';
            };
            </script>");
        }
    }
    else {
        echo("<script>
        window.onload = function() {
            user.style.borderColor = 'red';
            user.placeholder = 'Username Does not Exist!';
        };
        </script>");
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style = "overflow: hidden;">
    <style>
        #forr{position: relative;
            top: 100%;
            width: 600px;
            height: 470px;
            background-color: white;
            opacity: 15%;
            border-radius: 1.3rem; 
        }
        .main h2{
            z-index: 1;
            position: absolute;
            top: -30%;
            left: 19.5%;
            color: #fff;
            text-shadow: 0 0 20px #000, 0 0 30px #000;
            -webkit-text-stroke-width: 3px;
            -webkit-text-stroke-color: black;
            font-size: 90px;
            text-transform: uppercase;
            font-weight: bolder;
            letter-spacing: 15px;
            line-height: 60px;
        }
        #user{
            position: relative;
            left: 12.5%;
            top:-355px;
            width: 70%;
            height: 50px;
            border-radius: 15px;
            font-size: 18px;
            border-width: 3px;
            border-color: black;
        }
        #pwd{
            position: relative;
            left: 12.5%;
            width: 70%;
            top:-330px;
            height: 50px;
            border-radius: 15px;
            font-size: 18px;
            border-width: 3px;
            border-color: black;
        }
        #bsend{
            position: relative;
            width: 70%;
            height: 60px;
            border-radius: 15px;
            text-transform: uppercase;
            background-color: rgb(26, 182, 33);
            font-weight: 650;
            font-size: 23px;
            margin: 15px;
            left:11.5%;
            top:-300px;
        }
        .new{
            position: absolute;
            top: 70%;
            left: 35%;
            color: #fff;
            font-size: 30px;
            font-weight: 700;
        }
        .new:hover {
            color: #cccccc;
        }
        input::placeholder{
             text-align: center;
        }
        body{
            font-family: "Segoe UI", sans-serif;
            background: url(bg.png)no-repeat;
            background-size: cover;
            height: 100vh;
        }

        .main{
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
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
    <img src="img/plus.png" class="object" data-value="-6" alt="" id="plus">
    <img src="img/minus.png" class="object" data-value="5" alt="" id="minus">
    <img src="img/cross.png" class="object" data-value="-3" alt="" id="cross">
    <img src="img/division.png" class="object" data-value="8" alt="" id="division">
    <img src="img/equal.png" class="object" data-value="2" alt="" id="equal">
    <div class="main">
        <h2>LOGIN</h2>
        <form id = "form-user" action="login.php" method="post">
            <div class="form-box">
            <div id="forr"></div>
                <label for="user"></label>
                <input type="text" id="user" name="user" autofocus placeholder="Username" tabindex="1"/>
            </div><br>
            <div class="form-box">
                <label for="pwd"></label>
                <input type="password" id="pwd" name="pwd" required placeholder="Password" tabindex="2"/>
            </div><br>
            <a class="buts">
            <div class="form-box">
                <button id="bsend">PRACTICE!</button>
            </div>
            </a>
            <a class="new" href="dump.php">NEW USER?</a>
            <br>
        </form>
    </div>
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