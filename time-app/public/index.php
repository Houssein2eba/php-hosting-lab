<?php

date_default_timezone_set('Africa/Tunis');

$currentTimestamp = time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DevOps Time Server</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: #1e293b;
            padding: 50px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: #38bdf8;
        }

        .time {
            font-size: 48px;
            font-weight: bold;
            margin: 20px 0;
        }

        .date {
            font-size: 22px;
            color: #cbd5e1;
        }

        .server {
            margin-top: 30px;
            color: #94a3b8;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>DevOps Time Server</h1>

    <div class="time" id="time"></div>

    <div class="date" id="date"></div>

    <div class="server">
        Served from Docker + PHP + NGINX
    </div>

</div>

<script>
    // Initial time comes from the PHP server
    let currentTime = new Date(<?= $currentTimestamp * 1000 ?>);

    function updateClock() {

        const timeElement = document.getElementById("time");
        const dateElement = document.getElementById("date");

        timeElement.textContent = currentTime.toLocaleTimeString(
            "en-GB",
            {
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                hour12: false,
                timeZone: "Africa/Tunis"
            }
        );

        dateElement.textContent = currentTime.toLocaleDateString(
            "en-US",
            {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric",
                timeZone: "Africa/Tunis"
            }
        );

        currentTime.setSeconds(currentTime.getSeconds() + 1);
    }

    updateClock();

    setInterval(updateClock, 1000);
</script>

</body>
</html>
