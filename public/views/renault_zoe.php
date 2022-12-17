<?php
setcookie('car_id', "", -3600, "/");

$carName = "Renault Zoe"; //Zmienna
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
<div class="one-car-container">
    <?php
    include('menu.php');
    ?>
    <main class="one-car-main">
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
        <img src="public/img/<?php echo(trim($carRepository->getImgSrc($carName))) ?>.webp" id="car-photo">

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
                <div class="box" id="second-box">
                    <p>
                        <?php
                        echo($carName);
                        ?>
                        ! <br>
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
                        <td>
                            <?php
                            echo($carRepository->getFinalPrice(1));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4-6</td>
                        <td>
                            <?php
                            echo($carRepository->getFinalPrice(0.95));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>7-9</td>
                        <td>
                            <?php
                            echo($carRepository->getFinalPrice(0.75));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>10-13</td>
                        <td>
                            <?php
                            echo($carRepository->getFinalPrice(0.65));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>15-17</td>
                        <td>
                            <?php
                            echo($carRepository->getFinalPrice(0.55));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>18-31</td>
                        <td>
                            <?php
                            echo($carRepository->getFinalPrice(0.45));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="first-column-last-row">>31</td>
                        <td id="second-column-last-row">
                            <?php
                            echo($carRepository->getFinalPrice(0.35));
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</div>
</body>