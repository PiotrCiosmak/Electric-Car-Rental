<?php
setcookie('car_id', "", -3600, "/");
$carName = "Ferrari F40"; //Zmienna
include('user_cookie.php');

require_once __DIR__ . "/../../src/repository/CarRepository.php";
$carRepository = new CarRepository();
$cookie_name = "car_id";
$cookie_value = $carRepository->getId($carName);
setcookie($cookie_name, $cookie_value, 0, "/");
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>
        <?php
        echo($carName);
        ?>
    </title>

</head>

<body>
<div class="f40-container">
    <?php
    include('menu.php');
    ?>
    <main class="f40-main">
        <div class="title">
            <h2>
                <?php
                echo($carName);
                ?>
            </h2>
        </div>
        <div id="car-name-and-price">
            <p id="car-name">
                <?php
                echo($carName);
                ?>
            </p>
            <p id="car-price">
                <?php
                echo($carRepository->getFinalPrice(1));
                ?>
            </p>
        </div>
        <img id="car-photo" src="public/img/<?php echo(trim($carRepository->getImgSrc($carName))) ?>.webp">

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