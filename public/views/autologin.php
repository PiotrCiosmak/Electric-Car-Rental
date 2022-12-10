<?php
if (isset($_COOKIE["user_id"])) {
    return $this->render('main_page');
}