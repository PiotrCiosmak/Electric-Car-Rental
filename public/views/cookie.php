<?php
if (!isset($_COOKIE['user_id'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/");
}
