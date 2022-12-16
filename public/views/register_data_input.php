<?php
if (isset($_COOKIE["register_data_input"])) {
    header("Location: main_page");
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>WPROWADŹ DANE</title>
</head>

<body id="body2">
<div class="container">
    <div class="logo_and_title">
        <img src="public/img/logo.svg">
        <h1>Electric Car Rent</h1>
        <h3>Największa wypożyczalnia samochodów elektrycznych w Polsce</h3>
    </div class="data-input-container">
    <form class="data-input" action="register_data_input_check" METHOD="post">
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
        <input name="first-name" type="text" placeholder="imie" id="first-name">
        <input name="last-name" type="text" placeholder="nazwisko" id="last-name">
        <input name="phone-numer" type="text" placeholder="numer telefonu" id="phone-numer">
        <input name="street" type="text" placeholder="ulica" id="street">
        <input name="house-number" type="text" placeholder="numer domu" id="house-number">
        <input name="apartment-number" type="text" placeholder="numer mieszkania" id="apartment-number">
        <input name="post-code" type="text" placeholder="kod pocztowy" id="post-code">
        <input name="city" type="text" placeholder="miejscowość" id="city">
        <button id="submit-data-button" type="submit">DALEJ</button>
    </form>
</div>
</div>
</body>