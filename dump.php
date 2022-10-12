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
        var mail = document.getElementById('mail');
        mail.style.borderColor = 'black';
        mail.placeholder = 'Parent Email ID';
        user.placeholder = 'Username';
    }
        </script>");
    $user = $_POST["user"];
    $pwd =  $_POST["pwd"];
    $age = $_POST["age"];
    $mail = $_POST["mail"];
    $legal = TRUE;
    if ($user != "") {
        $ip = $_SERVER['REMOTE_ADDR'];
        $cur = json_decode(file_get_contents('user.json'), true);
        $cur2 = json_decode(file_get_contents('ip.json'), true);
        if (preg_match('[@_!#$%^&*()<>?/|}{~:]', $user) == TRUE) {
            echo("<script>
            window.onload = function() {
            user.style.borderColor = 'red';
            user.placeholder = 'Illegal Character!';
            }
            </script>");
            $legal = FALSE;
        }
        if(strpos('@gmail.com', $mail) == TRUE){
            echo("<script>
            window.onload = function() {
            mail.style.borderColor = 'red';
            mail.placeholder = 'Invalid Mail!';
            }
            </script>");
            $legal = FALSE;
        }
        if (preg_match('[_#%^&()<>?/|}{~:]', $pwd) == TRUE) {
            echo("<script>
            window.onload = function() {
            pwd.style.borderColor = 'red';
            pwd.placeholder = 'Illegal Character!';
            }
            </script>");
            $legal = FALSE;
        }
        if (array_key_exists($user, $cur)) {
            echo("<script>
            window.onload = function() {
            user.style.borderColor = 'red';
            user.placeholder = 'Username Already Exists!';
            }
            </script>");
            $legal = FALSE;
        }
        if (strlen($user) < 5) {
            echo("<script>
            window.onload = function() {
            user.style.borderColor = 'red';
            user.placeholder = 'Name too Short!';
            }
            </script>");
            $legal = FALSE;
        }
        if (strlen($pwd) < 5) {
            echo("<script>
            window.onload = function() {
            pwd.style.borderColor = 'red';
            pwd.placeholder = 'Password too Short!';
            }
            </script>");
            $legal = FALSE;
        }
        if ($pwd == $user) {
            echo("<script>
            window.onload = function() {
            pwd.style.borderColor = 'red';
            pwd.placeholder = 'Password same as Name!';
            }
            </script>");
            $legal = FALSE;
        }
        if ($age == "0") {
            echo("<script>
            window.onload = function() {
            age.style.borderColor = 'red';
            }
            </script>");
            $legal = FALSE;
        }
        if ($legal) {
            $cur[$user] = ["Password" => $pwd, "Age" => $age, "Mail" => $mail, "IP" => $ip];
            $cur2[$ip] = $user;

            file_put_contents('user.json', json_encode($cur));
            file_put_contents('ip.json', json_encode($cur2));
            $_SESSION['loggedin'] = "TRUE";
            $_SESSION['name'] = $user;
            $_SESSION['age'] = $age;
            header("Location: mult.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel = "icon" href = "img/logob.png" type = "image/x-icon">
</head>
<body style="overflow:hidden;">
    <style>
        body{
            font-family: "Segoe UI", sans-serif;
            background: url(bg.png)no-repeat;
            background-size: cover;
            height: 100vh;
        }

        #user{
            position: relative;
            left: 7.5%;
            width: 80%;
            height: 40px;
            border-radius: 15px;
            font-size: 18px;
            border-width: 3px;
            border-color: black;
            top:40px;
        }
        input::placeholder{
            text-align: center;
        }
        #pwd{
            position: relative;
            left: 7.5%;
            width: 80%;
            height: 40px;
            border-radius: 15px;
            font-size: 18px;
            border-width: 3px;
            border-color: black;
            top: 40px;
        }
        #mail{
            position: relative;
            left: 7.5%;
            width: 80%;
            height: 40px;
            border-radius: 15px;
            font-size: 18px;
            border-width: 3px;
            border-color: black;
            top: 40px;
        }
        #age{
            position: relative;
            left: 14%;
            width: 70%;
            height: 40px;
            border-radius: 15px;
            font-size: 18px;
            border-width: 3px;
            border-color: black;
            top:30px;
            text-align: center;
        }
        .main{
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color:#ffffff29;
            width: 450px;
            height: 420px;
            border-radius :1.3rem;
        }
        #bsend{
            position: relative;
            width: 70%;
            height: 50px;
            border-radius: 15px;
            text-transform: uppercase;
            background-color: rgb(26, 182, 33);
            font-weight: 650;
            font-size: 23px;
            margin: 15px;
            left:10.5%;
            top: 30px;
        }
        #bsend:hover{
            font-size: 24px;
            background-color: rgb(22, 170, 29);
        }

        .main h2{
            z-index: 1;
            position: absolute;
            top: -50%;
            left: -10%;
            color: #fff;
            text-shadow: 0 0 20px #000, 0 0 30px #000;
            -webkit-text-stroke-width: 3px;
            -webkit-text-stroke-color: black;
            font-size: 90px;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: 20px;
            line-height: 60px;
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
    <div class="main1">
        <div class="main">
            <h2>REGISTER</h2>
            <form id = "form-user" action="dump.php" method="post">
                <div class="form-box">
                    <label for="user"></label>
                    <input type="text" id="user" name="user" required placeholder="Username" tabindex="1"/>
                </div><br>
                <div class="form-box">
                    <label for="pwd"></label>
                    <input type="password" id="pwd" name="pwd" required placeholder="Password" tabindex="2"/>
                </div><br>
                <div class="form-box">
                    <label for="mail"></label>
                    <input type="text" id="mail" name="mail" required placeholder="Parent Email ID" tabindex="2"/>
                </div><br>
                <div class="form-box">
                    <label for="age"><br></label>
                        <select id="age" name="age" tabindex="3">
                            <option value="0">Select Grade</option>
                            <option value="1">KG - 1</option>
                            <option value="2">2 - 4</option>
                            <option value="3">5 and Above</option>
                        </select>
                </div><br>
                <a class="buts">
                <div class="form-box">
                    <button id="bsend">Start!</button>
                </div>
                </a>
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