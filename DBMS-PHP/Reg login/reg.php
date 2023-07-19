<!DOCTYPE html>
<html>
  
<head>
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/b8c6c27289.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Merienda+One&family=Permanent+Marker&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <!-- fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Yesteryear&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/2312f8d79b.js"></script><script src="https://use.fontawesome.com/2312f8d79b.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="../css/main.css" rel="stylesheet" media="all">;
</head>
  
<body  style="background:-webkit-linear-gradient(bottom left,#fc2c77 0,#6c4079 70%); color: #fff;">
    <center>
<?php
        header( "refresh:10;url=./login.html" );
        $conn = mysqli_connect("localhost", "root", "", "prop_mang_system");
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        $f_name =  $_REQUEST['f_name'];
        $l_name = $_REQUEST['l_name'];
        $user_id =  $_REQUEST['user_id'];
        $street =  $_REQUEST['street'];
        $city = $_REQUEST['city'];
        $phone1 =  $_REQUEST['phone1'];
        $phone2 = $_REQUEST['phone2'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $type = $_REQUEST['type'];
        $sql = "INSERT INTO user_registration VALUES ('$user_id', '$type','$f_name', 
            '$l_name', '$password','$email','$street','$city')";
        $sql1="INSERT INTO user_phone VALUES ('$user_id', '$phone1')";
        $sql2="INSERT INTO user_phone VALUES ('$user_id', '$phone2')";

        if(mysqli_query($conn, $sql)){
            echo "<h3>Registration Successful</h3>"; 
  
            echo nl2br("Added User:\n$f_name $l_name\nID: $user_id\n ");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }   

        if(mysqli_query($conn, $sql1)){
            echo "";
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }

        if(mysqli_query($conn, $sql2)){
            echo "";
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
<div id="app"></div>
    </center>
</body>
<style>
                .base-timer {
            position: relative;
            width: 300px;
            height: 300px;
            }

            .base-timer__svg {
            transform: scaleX(-1);
            }

            .base-timer__circle {
            fill: none;
            stroke: none;
            }

            .base-timer__path-elapsed {
            stroke-width: 7px;
            stroke: grey;
            }

            .base-timer__path-remaining {
            stroke-width: 7px;
            stroke-linecap: round;
            transform: rotate(90deg);
            transform-origin: center;
            transition: 1s linear all;
            fill-rule: nonzero;
            stroke: currentColor;
            }

            .base-timer__path-remaining.green {
            color: rgb(65, 184, 131);
            }

            .base-timer__path-remaining.orange {
            color: orange;
            }

            .base-timer__path-remaining.red {
            color: red;
            }

            .base-timer__label {
            position: absolute;
            width: 300px;
            height: 300px;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
    }
</style>
<script>
            const FULL_DASH_ARRAY = 283;
        const WARNING_THRESHOLD = 10;
        const ALERT_THRESHOLD = 5;

        const COLOR_CODES = {
        info: {
            color: "green"
        },
        warning: {
            color: "orange",
            threshold: WARNING_THRESHOLD
        },
        alert: {
            color: "red",
            threshold: ALERT_THRESHOLD
        }
        };

        const TIME_LIMIT = 10;
        let timePassed = 0;
        let timeLeft = TIME_LIMIT;
        let timerInterval = null;
        let remainingPathColor = COLOR_CODES.info.color;

        document.getElementById("app").innerHTML = `
        <div class="base-timer">
        <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">
            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
            <path
                id="base-timer-path-remaining"
                stroke-dasharray="283"
                class="base-timer__path-remaining ${remainingPathColor}"
                d="
                M 50, 50
                m -45, 0
                a 45,45 0 1,0 90,0
                a 45,45 0 1,0 -90,0
                "
            ></path>
            </g>
        </svg>
        <span id="base-timer-label" class="base-timer__label">${formatTime(
            timeLeft
        )}</span>
        </div>
        `;

        startTimer();

        function onTimesUp() {
        clearInterval(timerInterval);
        }

        function startTimer() {
        timerInterval = setInterval(() => {
            timePassed = timePassed += 1;
            timeLeft = TIME_LIMIT - timePassed;
            document.getElementById("base-timer-label").innerHTML = formatTime(
            timeLeft
            );
            setCircleDasharray();
            setRemainingPathColor(timeLeft);

            if (timeLeft === 0) {
            onTimesUp();
            }
        }, 1000);
        }

        function formatTime(time) {
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;

        if (seconds < 10) {
            seconds = `0${seconds}`;
        }

        return `${minutes}:${seconds}`;
        }

        function setRemainingPathColor(timeLeft) {
        const { alert, warning, info } = COLOR_CODES;
        if (timeLeft <= alert.threshold) {
            document
            .getElementById("base-timer-path-remaining")
            .classList.remove(warning.color);
            document
            .getElementById("base-timer-path-remaining")
            .classList.add(alert.color);
        } else if (timeLeft <= warning.threshold) {
            document
            .getElementById("base-timer-path-remaining")
            .classList.remove(info.color);
            document
            .getElementById("base-timer-path-remaining")
            .classList.add(warning.color);
        }
        }

        function calculateTimeFraction() {
        const rawTimeFraction = timeLeft / TIME_LIMIT;
        return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
        }

        function setCircleDasharray() {
        const circleDasharray = `${(
            calculateTimeFraction() * FULL_DASH_ARRAY
        ).toFixed(0)} 283`;
        document
            .getElementById("base-timer-path-remaining")
            .setAttribute("stroke-dasharray", circleDasharray);
        }
</script>
</html>