<?php
include('user_cookie.php');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>NASZE AUTA</title>

</head>

<body>
<div class="our-cars-container">
    <?php
    include('menu.php');
    ?>
    <main class="our-cars-main">
        <div class="title">
            <h2>NASZE AUTA</h2>
        </div>
        <header>
            <div>
                <input id="input-search-bar" placeholder="wyszukaj">
            </div>
        </header>

        <div class="cars">
            <?php
            $tmp = new CarRepository();
            $cars = $tmp->getAllCars();
            foreach ($cars as $car) { ?>
                <a href="<?php echo($car->getImgSource()) ?>">
                    <div class="car">
                        <img src="public/img/<?php echo($car->getImgSource()) ?>.webp">
                        <div class="background-of-car">
                            <p class="car-name"><?php echo($car->getName()) ?></p>
                            <img src="public/img/0-100icon.svg">
                            <p class="car-time-to-100"><?php echo($car->getTimeTo100()) ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </main>
</div>
</body>

<template id="car-template">
    <a href="img_source">
        <div class="car">
            <img src="public/img/img_source.webp">
            <div class="background-of-car">
                <p class="car-name"> Nazwa</p>
                <img src="public/img/0-100icon.svg">
                <p class="car-time-to-100">10.0</p>
            </div>
        </div>
    </a>
</template>