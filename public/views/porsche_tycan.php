<?php
include('cookie.php');
$_SESSION['car_id'] = 2;
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
        <a href="sign_in" class="logout-button">
            <img src="public/img/logout.svg" id="logout">
        </a>
    </nav>
    <main class="one-car-main">
        <div class="title">
            <h2>PORSCHE TYCAN</h2>
        </div>
        <div id="car-name-and-price">
            <p id="car-name">PORSCHE TYCAN</p>
            <p id="car-price">1 900 ZŁ</p>
        </div>
        <img src="public/img/porche.webp" id="car-photo">

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

        <section class="description">
            <div class="info">
                <div class="box" id="first-box">
                    <p>Quisque consectetur ante eget sem convallis pellentesque. Sed vitae est non nulla consectetur
                        tincidunt rhoncus sed est. Quisque ultricies, risus vitae vulputate placerat, sem felis lacinia
                        nibh, ac tempus ipsum ipsum et augue. Sed posuere ipsum vitae lectus molestie, vitae imperdiet
                        velit porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                        turpis egestas.</p>
                </div>
                <div class="box" id="secound-box">
                    <p>PORSCHE TYCAN! <br>
                        - 1-8 dni – 250 km/doba <br>
                        - 9-13 dni – 200 km/doba <br>
                        - od 14 dni – 150 km/doba <br>
                        - Miesiąc – 3000 km <br> <br>
                        - Wszystkie podane ceny są cenami NETTO. <br>
                        - Kaucja ustalana indywidualnie. <br>
                        - Każdy dodatkowy kilometr to koszt 3zł brutto.
                    </p>
                </div>
            </div>
            <div class="box" id="third-box">
                <table style="width:100%">
                    <tr>
                        <th>PRZEDZIAŁ DNI</th>
                        <th>CENA/DZIEŃ</th>
                    </tr>
                    <tr>
                        <td>1-3</td>
                        <td>1900 zł</td>
                    </tr>
                    <tr>
                        <td>4-6</td>
                        <td>1800 zł</td>
                    </tr>
                    <tr>
                        <td>7-9</td>
                        <td>1400 zł</td>
                    </tr>
                    <tr>
                        <td>10-13</td>
                        <td>1200 zł</td>
                    </tr>
                    <tr>
                        <td>15-17</td>
                        <td>1000 zł</td>
                    </tr>
                    <tr>
                        <td>18-31</td>
                        <td>850 zł</td>
                    </tr>
                    <tr>
                        <td id="first-column-last-row">>31</td>
                        <td id="second-column-last-row">700 zł</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</div>
</body>