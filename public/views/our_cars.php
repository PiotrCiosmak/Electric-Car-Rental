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
                <form>
                    <input id="input-search-bar" placeholder="wyszukaj">
                </form>
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
                            <p><?php echo($car->getName()) ?></p>
                            <img src="public/img/0-100icon.svg">
                            <p><?php echo($car->getTimeTo100()) ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </main>
</div>
</body>