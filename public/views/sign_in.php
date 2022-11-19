<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <title>LOGOWANIE</title>
</head>

<body>
<div class="container">
    <div class="logo_and_title">
        <img src="public/img/logo.svg">
        <h1>Electric Car Rent</h1>
        <h3>Największa wypożyczalnia samochodów elekrycznych w Polsce</h3>
    </div>
    <div class="sign-in-container">
        <form class="sign-in" action="main_page">
            <input name="email" type="text" placeholder="email" id="email">
            <input name="password" type="password" placeholder="hasło" id="pass">
            <button id="sign-in-button">ZALOGUJ SIĘ</button>
        </form>
        <a href="register">
            <button id="click-to-switch">Kliknij, aby się zajerestrować</button>
        </a>
    </div>
</div>
</body>