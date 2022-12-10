<?php
include('register_data_cookie.php');
if (!isset($_COOKIE["user_id"])) {
    header("Location: sign_in");
}