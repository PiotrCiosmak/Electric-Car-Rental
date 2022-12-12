<?php
include('user_cookie.php');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>KONTAKT</title>
</head>

<body>
<div class="contact-container">
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
                <a href="konto" id="last-button" class="menu-button">KONTO</a>
            </li>
        </ul>
        <a href="delete_cookie" class="logout-button">
            <img src="public/img/logout.svg" id="logout">
        </a>
    </nav>
    <main class="contact-main">
        <div class="title">
            <h2>KONTAKT</h2>
        </div>
        <div id="contact-info">
            <div id="phone-numer-box">
                <p id="phone-number-label">Infolinia</p>
                <p id="phone-number">+48 791 371 715</p>
            </div>
            <div id="email-address-box">
                <p id="email-address-label">e-mail</p>
                <p id="email-address">electricCarRent@gmail.com</p>
            </div>
        </div>
        <div id="map">
            <img src="public/img/porche.webp">
        </div>
    </main>
</div>
</body>