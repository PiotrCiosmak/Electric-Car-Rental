<?php
include('user_cookie.php');
$tmpUserRepository = new UserRepository();
if (!$tmpUserRepository->isAdmin()) {
    header("Location: account");
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>Panel admina</title>
</head>

<body id="body2">
<div class="admin-panel-container">
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
            <li id="last-button">
                <a href="account" class="menu-button">KONTO</a>
            </li>
        </ul>
        <a href="delete_cookie" class="logout-button">
            <img src="public/img/logout.svg" id="logout">
        </a>
    </nav>
    <main class="account-main">
        <div class="title">
            <h2>PANEL ADMINISTRATORA</h2>
        </div>
        <div id="change-car-price">
            <h3 class="account-sub-title">Zmień cenę auta</h3>
            <form id="update-car-price" action="change_car_price" METHOD="post">
                <div id="message">
                    <p>
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                if ($message === "Cena została zaktualizowana!") {
                                    echo htmlspecialchars($message);
                                }
                            }
                        }
                        ?>
                    </p>
                </div>
                <div id="error-message-car-price">
                    <p>
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                if ($message <> "Cena została zaktualizowana!") {
                                    echo htmlspecialchars($message);
                                }
                            }
                        }
                        ?>
                    </p>
                </div>
                <select class="select-car-name" name="car-name">
                    <?php
                    $tmp = new CarRepository();
                    $cars = $tmp->getAllNames();
                    foreach ($cars as $row) { ?>
                        <tr>
                            <option class="option"> <?php echo($row['name']); ?> </option>
                        </tr>
                    <?php } ?>
                    ?>
                </select>
                <input name="car-price" class="input-car-price"
                       placeholder="nowa cena">
                <button id="submit-change-car-price-button" type="submit">Potwierdź</button>
            </form>
        </div>
    </main>
</body>