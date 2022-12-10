<?php
include('userCookie.php');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>PODSUMOWANIE REZERWACJI</title>

</head>

<body>
<div class="container">
    <div class="summary">
        <p id="summary-title">
        <div id="error-message">
            <p style="font-size:3em; color: #F3FAFF;">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo htmlspecialchars($message);
                    }
                }
                setcookie('car_id', "", -1, "/");
                ?>
            </p>
        </div>
        </p>
        <a href="main_page">
            <button id="summary-button">DALEJ</button>
        </a>
    </div>
</div>
</body>