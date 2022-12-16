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

<body id="body2">
<div class="contact-container">
    <?php
    include('menu.php');
    ?>
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