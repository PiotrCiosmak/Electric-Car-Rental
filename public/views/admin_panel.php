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
    <script type="text/javascript" src="./public/js/changeCarPrice.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>Panel admina</title>
</head>

<body id="body2">
<div class="admin-panel-container">
    <?php
    include('menu.php');
    ?>
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
                                if ($message === "Uzupełnij wymagane pola!" || $message === "Cena nie może być wartością ujemną!") {
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
                </select>
                <input name="car-price" class="input-car-price"
                       placeholder="nowa cena">
                <button id="submit-change-car-price-button" type="submit">Potwierdź</button>
            </form>
        </div>
        <div id="add-new-car">
            <h3 id = "add-new-car-label" class="account-sub-title">Dodaj nowe auto</h3>
            <form id="add-new-car" action="add_new_car" METHOD="post">
                <div id="message">
                    <p>
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                if ($message === "Auto zostało dodane!") {
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
                                if ($message === "Błąd! Auto nie zostało dodane!") {
                                    echo htmlspecialchars($message);
                                }
                            }
                        }
                        ?>
                    </p>
                </div>
                <input name="car-name" class="input-car-name"
                       placeholder="nazwa">
                <input name="car-price" class="input-car-price"
                       placeholder="nowa cena">
                <input name="car-time-to-100" class="input-car-time-to-100"
                       placeholder="czas 0-100">

                <button id="add-new-car-button" type="submit">Potwierdź</button>
            </form>
        </div>
    </main>
</body>