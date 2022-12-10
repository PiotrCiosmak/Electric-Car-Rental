<?php
$user_id = $_COOKIE["user_id"];
$length = mb_strlen($user_id);
if ($length <= 0) {
    echo($user_id);
    exit(1);
}