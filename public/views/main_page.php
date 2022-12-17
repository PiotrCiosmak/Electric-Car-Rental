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
    <title>STRONA GŁÓWNA</title>

</head>

<body>
<div class="main-page-container">
    <?php
    include('menu.php');
    ?>
    <main class="main-page-main">
        <div class="title">
            <h2>NASZA FLOTA</h2>
        </div>
        <div class="cars">
            <a href="porsche_tycan">
                <div class="car">
                    <img src="public/img/porsche_taycan.webp">
                    <div class="background-of-car">
                        <p>Porsche Tycan</p>
                        <img src="public/img/0-100icon.svg">
                        <p>2,6</p>
                    </div>
                </div>
            </a>
            <a href="porsche_tycan">
                <div class="car">
                    <img src="public/img/audi_rs_e_tron_gt.webp">
                    <div class="background-of-car">
                        <p>Audi RS E-tron GT</p>
                        <img src="public/img/0-100icon.svg">
                        <p>3,3</p>
                    </div>
                </div>
            </a>
            <a href="porsche_tycan">
                <div class="car">
                    <img src="public/img/nissan_leaf.webp">
                    <div class="background-of-car">
                        <p>Nissan Leaf</p>
                        <img src="public/img/0-100icon.svg">
                        <p>6,9</p>
                    </div>
                </div>
            </a>
        </div>
        <div id="see-more">
            <a href="our_cars">
                <button id="see-more-button">ZOBACZ WIĘCEJ</button>
            </a>
        </div>
        <div class="main-box-background">
            <div id="car-transporter-photo">
                <img src="public/img/car_transporter.webp">
            </div>
            <div id="car-transporter-description">
                <p>
                    Wynajmij swój wymarzony samochód, a my podstawimy go gdzie tylko zechcesz!
                </p>
            </div>
        </div>
        <div class="title">
            <h2>SZCZEGÓŁY WYNAJMU</h2>
        </div>
        <div class="main-box-background">
            <div class="main-icon-and-description">
                <div class="main-icon">
                    <i class="fa-regular fa-hourglass-half fa-10x"></i>
                </div>
                <div class="main-description">
                    <h4 class="main-description-title">
                        Szybka i łatwa rezerwacja
                    </h4>
                    <p class="main-description-content">
                        Proces rezerwacji auta zminimalizowaliśmy do podstawowych formalności. Twój czas jest dla nas
                        cenny.
                    </p>
                </div>
            </div>
            <div class="main-icon-and-description">
                <div class="main-icon">
                    <i class="fa-solid fa-coins fa-10x"></i>
                </div>
                <div class="main-description">
                    <h4 class="main-description-title">
                        Atrakcyjne stawki
                    </h4>
                    <p class="main-description-content">
                        Posiadamy najatrakcyjniejsze oferty krótkoterminowego oraz długoterminowego wynajmu samochodów.
                    </p>
                </div>
            </div>
            <div class="main-icon-and-description">
                <div class="main-icon">
                    <i class="fa-solid fa-bullseye fa-10x"></i>
                </div>
                <div class="main-description">
                    <h4 class="main-description-title">
                        Bez ukrytych opłat
                    </h4>
                    <p class="main-description-content">
                        Nie naliczamy dodatkowych opłat, a w naszej umowie nie znajdziesz niczego napisanego „drobnym
                        drukiem”.
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
</body>