<?php

date_default_timezone_set('Africa/Tunis');

$host = getenv('DB_HOST') ?: 'database';
$database = getenv('DB_NAME') ?: 'hosting_lab';
$username = getenv('DB_USER') ?: 'app_user';
$password = getenv('DB_PASSWORD') ?: '';

$dbConnected = false;
$dbMessage = 'Database unavailable';

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$database};charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    $dbConnected = true;
    $dbMessage = 'Connected';

} catch (PDOException $exception) {
    $dbMessage = 'Connection failed';
}

$phpVersion = PHP_VERSION;
$currentTimestamp = time();

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>DevOps Hosting Lab</title>

<style>

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;

    background:
        radial-gradient(circle at top left, #172554, #020617 45%);

    color: #e2e8f0;

    min-height: 100vh;
}

.container {
    width: 90%;
    max-width: 1100px;
    margin: auto;
    padding: 60px 0;
}


/* HEADER */

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-bottom: 50px;
}

.logo {
    font-size: 26px;
    font-weight: bold;
    color: #38bdf8;
}

.environment {
    background: #172554;
    color: #60a5fa;

    padding: 8px 15px;

    border-radius: 20px;

    font-size: 14px;

    border: 1px solid #1e40af;
}


/* HERO */

.hero {
    margin-bottom: 45px;
}

.hero h1 {
    font-size: 48px;
    margin: 0 0 10px;
    color: white;
}

.hero p {
    color: #94a3b8;
    font-size: 18px;
    max-width: 650px;
    line-height: 1.6;
}


/* STATUS */

.status-banner {
    display: flex;
    align-items: center;
    gap: 12px;

    background: #052e16;

    border: 1px solid #166534;

    color: #86efac;

    padding: 16px 20px;

    border-radius: 10px;

    margin-bottom: 30px;
}

.status-dot {
    width: 10px;
    height: 10px;

    background: #22c55e;

    border-radius: 50%;

    box-shadow: 0 0 10px #22c55e;
}


/* GRID */

.grid {
    display: grid;

    grid-template-columns:
        repeat(auto-fit, minmax(220px, 1fr));

    gap: 20px;
}


/* CARDS */

.card {

    background: rgba(15, 23, 42, 0.85);

    border: 1px solid #1e293b;

    border-radius: 12px;

    padding: 25px;

    transition: 0.2s;
}

.card:hover {

    transform: translateY(-4px);

    border-color: #38bdf8;

    box-shadow:
        0 10px 30px rgba(0,0,0,.3);
}

.card-title {
    color: #94a3b8;

    text-transform: uppercase;

    font-size: 12px;

    letter-spacing: 1px;

    margin-bottom: 15px;
}

.card-value {

    font-size: 22px;

    font-weight: bold;

    color: white;
}

.online {
    color: #4ade80;
}

.offline {
    color: #f87171;
}

.description {

    color: #64748b;

    margin-top: 10px;

    font-size: 14px;
}


/* ARCHITECTURE */

.architecture {

    margin-top: 40px;

    background: rgba(15,23,42,.8);

    padding: 30px;

    border-radius: 12px;

    border: 1px solid #1e293b;
}

.architecture h2 {
    margin-top: 0;
    color: white;
}

.arch-flow {

    display: flex;

    align-items: center;

    justify-content: center;

    flex-wrap: wrap;

    gap: 12px;

    margin-top: 30px;
}

.arch-item {

    padding: 13px 20px;

    background: #1e293b;

    border-radius: 8px;

    color: #38bdf8;

    font-weight: bold;
}

.arrow {

    color: #64748b;

    font-size: 22px;
}


/* FOOTER */

footer {

    text-align: center;

    color: #475569;

    margin-top: 50px;

    font-size: 14px;
}


/* MOBILE */

@media(max-width:600px) {

    .hero h1 {
        font-size: 35px;
    }

    .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

}

</style>

</head>


<body>

<div class="container">


<!-- HEADER -->

<div class="header">

    <div class="logo">
        ⚡ DevOps Lab
    </div>

    <div class="environment">
        ● DEVELOPMENT
    </div>

</div>



<!-- HERO -->

<section class="hero">

<h1>
Infrastructure is running.
</h1>

<p>
A containerized PHP application running behind NGINX
with MariaDB, Docker networking, health monitoring
and persistent storage.
</p>

</section>



<!-- STATUS -->

<div class="status-banner">

<div class="status-dot"></div>

All application services are operational

</div>



<!-- SERVICES -->

<div class="grid">


<!-- PHP -->

<div class="card">

<div class="card-title">
Application
</div>

<div class="card-value online">
● Online
</div>

<div class="description">
PHP <?= htmlspecialchars($phpVersion) ?>
</div>

</div>



<!-- DATABASE -->

<div class="card">

<div class="card-title">
Database
</div>

<div class="card-value
<?= $dbConnected ? 'online' : 'offline' ?>">

<?= $dbConnected ? '● Connected' : '● Offline' ?>

</div>

<div class="description">
MariaDB / <?= htmlspecialchars($database) ?>
</div>

</div>



<!-- DOCKER -->

<div class="card">

<div class="card-title">
Container
</div>

<div class="card-value">
Docker
</div>

<div class="description">
Application container
</div>

</div>



<!-- NGINX -->

<div class="card">

<div class="card-title">
Reverse Proxy
</div>

<div class="card-value">
NGINX
</div>

<div class="description">
HTTP traffic gateway
</div>

</div>



<!-- SERVER TIME -->

<div class="card">

<div class="card-title">
Server Time
</div>

<div
    class="card-value"
    id="clock">
</div>

<div
    class="description"
    id="date">
</div>

</div>



<!-- HEALTH -->

<div class="card">

<div class="card-title">
Health Check
</div>

<div class="card-value online">
● Healthy
</div>

<div class="description">
/health.php
</div>

</div>


</div>



<!-- ARCHITECTURE -->

<div class="architecture">

<h2>
Request Architecture
</h2>

<div class="arch-flow">

<div class="arch-item">
Client
</div>

<div class="arrow">
→
</div>

<div class="arch-item">
NGINX
</div>

<div class="arrow">
→
</div>

<div class="arch-item">
Docker
</div>

<div class="arrow">
→
</div>

<div class="arch-item">
PHP
</div>

<div class="arrow">
→
</div>

<div class="arch-item">
MariaDB
</div>

</div>

</div>


<footer>

DevOps Hosting Lab • app.local

</footer>


</div>


<script>

let currentTime =
    new Date(<?= $currentTimestamp * 1000 ?>);


function updateClock() {

    document
        .getElementById("clock")
        .textContent =
        currentTime.toLocaleTimeString(
            "en-GB",
            {
                hour12: false,
                timeZone: "Africa/Tunis"
            }
        );


    document
        .getElementById("date")
        .textContent =
        currentTime.toLocaleDateString(
            "en-US",
            {
                weekday: "long",
                year: "numeric",
                month: "short",
                day: "numeric",
                timeZone: "Africa/Tunis"
            }
        );


    currentTime.setSeconds(
        currentTime.getSeconds() + 1
    );

}


updateClock();

setInterval(updateClock, 1000);

</script>


</body>
</html>
