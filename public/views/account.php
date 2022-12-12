<?php
$carName = "Porsche Tycan"; //Zmienna
include('user_cookie.php');

require_once __DIR__ . "/../../src/repository/CarRepository.php";
$carRepository = new CarRepository();
$cookie_name = "car_id";
$cookie_value = $carRepository->getId($carName);
setcookie($cookie_name, $cookie_value, 0, "/");
$tmpCarRepository = new CarRepository();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>Porsche Tycan</title>
</head>

<body>
<div class="one-car-container">
    <nav>
        <img src="public/img/logo.svg" id="logo">
        <ul>
            <li>
                <a href="main_page" class="menu-button">GŁÓWNA</a>
            </li>
            <li>
                <a href="our_cars" class="menu-button">NASZE AUTA</a>
            </li>
            <li>
                <a href="f40" class="menu-button">F40 NA WESELE</a>
            </li>
            <li>
                <a href="faq" class="menu-button">FAQ</a>
            </li>
            <li>
                <a href="discount" id="bottom-button" class="menu-button">RABAT</a>
            </li>
            <li>
                <a href="contact" id="bottom-button" class="menu-button">KONTAKT</a>
            </li>
            <li>
                <a href="account" id="last-button" class="menu-button">KONTO</a>
            </li>
        </ul>
        <a href="delete_cookie" class="logout-button">
            <img src="public/img/logout.svg" id="logout">
        </a>
    </nav>
    <main class="account-main">
        echo("xd");
    </main>
</div>
</body>