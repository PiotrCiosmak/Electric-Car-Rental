<?php
include('autologin.php');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/registerAndSignIn.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <title>ZAREJESTRUJ SIĘ</title>
</head>

<body id="body2">
<div class="container">
    <div class="logo_and_title">
        <img src="public/img/logo.svg">
        <h1>Electric Car Rent</h1>
        <h3>Największa wypożyczalnia samochodów elekrycznych w Polsce</h3>
    </div>
    <div class="register-container">
        <form class="register" action="register_check" METHOD="post">
            <div id="error-message">
                <p>
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo htmlspecialchars($message);
                        }
                    }
                    ?>
                </p>
            </div>
            <input name="email" type="text" placeholder="email" class="email">
            <input name="password" type="password" placeholder="hasło" class="pass">
            <button id="register-button" type="submit">ZAREJESTRUJ SIĘ</button>
        </form>
        <a href="sign_in">
            <button id="click-to-switch">Kliknij, aby się zalogowac</button>
        </a>
    </div>
</div>
</body>