<?php
include('user_cookie.php');

require_once __DIR__ . "/../../src/repository/UserDataRepository.php";
$tmpUserDataRepository = new UserDataRepository();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>Konto</title>
</head>

<body>
<div class="one-car-container">
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
                <a href="account"  class="menu-button">KONTO</a>
            </li>
        </ul>
        <a href="delete_cookie" class="logout-button">
            <img src="public/img/logout.svg" id="logout">
        </a>
    </nav>
    <main class="account-main">
        <div class="title">
            <h2>KONTO</h2>
        </div>
        <div id="account-all-columns">
            <div class="account-col" id="account-col-1">
                <div id="account-user-data">
                    <h3 class="account-sub-title">Dane osobowe</h3>
                    <p class="account-text">Imię:
                        <?php
                        echo($tmpUserDataRepository->getFirstName());
                        ?>
                    </p>
                    <p class="account-text">Nazwisko:
                        <?php
                        echo($tmpUserDataRepository->getLastName());
                        ?>
                    </p>
                    <p class="account-text">Numer telefonu:
                        <?php
                        echo($tmpUserDataRepository->getPhoneNumber());
                        ?>
                    </p>
                    <p class="account-text">Ulica:
                        <?php
                        echo($tmpUserDataRepository->getStreet());
                        ?>
                    </p>
                    <p class="account-text">Numer domu:
                        <?php
                        echo($tmpUserDataRepository->getHouseNumber());
                        ?>
                    </p>
                    <p class="account-text">Numer mieszkania:
                        <?php
                        echo($tmpUserDataRepository->getApartmentNumber());
                        ?>
                    </p>
                    <p class="account-text">Kod pocztowy:
                        <?php
                        echo($tmpUserDataRepository->getPostCode());
                        ?>
                    </p>
                    <p class="account-text">Miejscowość:
                        <?php
                        echo($tmpUserDataRepository->getTown());
                        ?>
                    </p>
                    <form action="update_user_data">
                        <button id="change-user-data">Zmień dane adresowe</button>
                    </form>
                </div>
                <div id="account-user-change-password">
                    <h3 class="account-sub-title">Zmień hasło</h3>
                    <form id="change-password" action="change_password_check" METHOD="post">
                        <div id="error-message">
                            <p>
                                <?php if (isset($messages)) {
                                    foreach ($messages as $message) {
                                        if ($message <> "Brak uprawnień!") {
                                            echo htmlspecialchars($message);
                                        }
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div id="all-input-change-password">
                            <input type="password" name="old-password" class="input-change-password"
                                   id="input-change-password-old-password"
                                   placeholder="stare hasło">
                            <input type="password" name="new-password-1" class="input-change-password"
                                   id="input-change-password-new-password"
                                   placeholder="nowe hasło">
                            <input type="password" name="new-password-2" class="input-change-password"
                                   id="input-change-password-new-password"
                                   placeholder="powtórz nowe hasło">
                        </div>
                        <button id="submit-change-password-button" type="submit">Dalej</button>
                    </form>
                </div>
            </div>
            <div class="account-col" id="account-col-2">
                <h3 class="account-sub-title">Twoje rezerwacje</h3>
                <table id="rent-table">

                    <?php
                    $tmp = new RentRepository();
                    $userRentals = $tmp->getAllUserRentals();
                    $counter = 0;
                    ?>
                    <tr>
                        <th class="rent-table-header-left">Lp.</th>
                        <th id="rent-table-header-center">Samochód</th>
                        <th id="rent-table-header-center">Początek wynajmu</th>
                        <th class="rent-table-header-right">Koniec wynajmu</th>
                    </tr>
                    <?php
                    if (sizeof($userRentals) == 0) {
                        ?>
                        <tr>
                            <td> <?php echo("1") ?> </td>
                            <td> <?php echo("brak"); ?> </td>
                            <td> <?php echo("brak"); ?> </td>
                            <td> <?php echo("brak"); ?> </td>
                        </tr>
                        <?php
                    }
                    foreach ($userRentals as $row) { ?>
                        <tr>
                            <td> <?php echo(++$counter) ?> </td>
                            <td> <?php echo($row['name']); ?> </td>
                            <td> <?php echo($row['start_date']); ?> </td>
                            <td> <?php echo($row['end_date']); ?> </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div id="goto-admin-page">
            <form id="go-to-page-form" action="admin_panel_check">
                <div id="error-message-admin-access">
                    <p>
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                if ($message === "Brak uprawnień!") {
                                    echo htmlspecialchars($message);
                                }
                            }
                        }
                        ?>
                    </p>
                </div>
                <button id="goto-admin-page-button">Przejdź do panelu administratora</button>
            </form>
    </main>
</body>