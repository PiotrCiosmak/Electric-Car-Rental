<?php
include('userCookie.php');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>FERRARI F40</title>

</head>

<body>
<div class="f40-container">
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
                <a href="discount" class="menu-button">RABAT</a>
            </li>
            <li>
                <a href="contact" class="menu-button">KONTAKT</a>
            </li>
        </ul>
        <a href="delete_cookie" class="logout-button">
            <img src="public/img/logout.svg" id="logout">
        </a>
    </nav>
    <main class="f40-main">
        <div class="title">
            <h2>F40</h2>
        </div>
        <div id="car-name-and-price">
            <p id="car-name">FERRARI F40</p>
            <p id="car-price">4 000 ZŁ</p>
        </div>
        <img id="car-photo" src="public/img/porche.webp">

        <div id="booking-container">
            <form id="booking" action="booking_check" METHOD="post">
                <div id="date">
                    <div id="first-date">
                        <label class="date-label" for="start-date">Początek:</label>
                        <input type="date" id="start-date" name="start-date">
                    </div>
                    <div id="second-date">
                        <label class="date-label" for="end-date">Koniec:</label>
                        <input type="date" id="end-date" name="end-date">
                    </div>
                </div>
                <button id="amount-of-days-button" type="submit">ZAREZERWUJ</button>
            </form>
        </div>

        <div id="f40-all-description-box">
            <div class="f40-description-box">
                <div class="f40-text">
                    <p class="f40-description-title">
                        MARZY CI SIE WYJĄTKOWY WYJAZD NA NOWĄ DROGĘ ŻYCIĄ?<br>
                        OTO JESTEŚMY! MY, DWA FERRARI F40 I NASI ELEGANCCY KIEROWCY<br>
                    </p>
                    <p class="f40-description-content">
                        TECHNICZNE INFORMACJE W ZWIĄZKU Z WYNAJMEM SAMOCHODU NA TE OKOLICZNOŚCI PRZEDSTAWIAJĄ SIĘ
                        NASTĘPUJĄCO:<br>
                        - DOJEDZIEMY DO CIEBIE NA TERENIE CAŁEJ POLSKI<br>
                        - W CENIE WYNAJMU ZAKŁADAMY 500 KM DO TWOJEJ DYSPOZYCJI<br>
                        - SAMOCHODY PRZYSTROJONE Z OKAZJI WASZEGO ŚWIĘTA, PODSTAWIAMY WAM WRAZ Z RÓWNIE WYSTROJONYMI
                        KIEROWCAMI<br>
                        - A ILE TAKA PRZYJEMNOŚC KOSZTUJE? CENA TO 4000 ZŁ NETTO ZA WESELE!
                    </p>
                </div>
            </div>
            <div class="f40-description-box">
                <div class="f40-text">
                    <p class="f40-description-title">
                        SKORO FORMALNOŚCI MAMY ZA SOBĄ OPISZEMY WAM, CO ZNAJDUJE SIĘ W ROZKŁADZIE JAZDY OFEROWANEJ PRZEZ
                        NAS USŁUGI:
                    </p>
                    <p class="f40-description-content">
                        - WYNAJĘCIE DWÓCH SAMOCHÓDÓW WRAZ Z DWOMA KIEROWCAMI<br>
                        - INDYWIDUALNIE TABLICE ZAPROJEKTOWANE SPECJALNIE DLA PAŃSTWA, KTÓRE ZOSTAJĄ NA PAMIĄTKĘ<br>
                        - PRZYJAZD PO PANA MŁODEGO<br>
                        - PRZYJAZD PO PANNE MŁODĄ<br>
                        - PRZEJAZD PARY MŁODEJ DO KOŚCIAŁA LUB URZĘDU STANU CYWILNEGO<br>
                        - PRZYJAZD NA SALĘ WESELNĄ<br>
                        - SESJA ŚLUBNA
                    </p>
                </div>
            </div>
            <div class="f40-description-box">
                <div class="f40-text">
                    <p class="f40-description-title">
                        A W TYM WSZYSTKIM BRAK UKRYTYCH I DODATKOWYCH KOSZTÓW ZA KILOMETRY, CZAS ITD.
                    </p>
                    <p class="f40-description-content">
                        Z DOŚWIADCZENIA WIEMY, ŻE CZAS TRASY I POSTOJÓW PODCZAS UROCZYSTOŚCI ŚLUBNEJ TO OD 5 DO 8
                        GODZIN. JAKO JEDYNI, NIE LICZYMY GO, BO WIADOMO ŻE LUDZIE SZCZEŚLIWI CZASU NIE LICZĄ!
                    </p>
                    <p class="f40-description-title">
                        JESTEŚMY OTWARCI NA WSZYSTKIE WASZE POMYSŁY, NAWET TE NAJDZIWNIEJSZE!
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
</body>