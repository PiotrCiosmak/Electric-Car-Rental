<?php
require_once "AppController.php";

class CookieController extends AppController
{
    public function __construct()
    {
        parent::__constructor();
    }

    public function delete_cookie()
    {
        setcookie('user_id', "", -3600, "/");
        setcookie('car_id', "", -3600, "/");
        setcookie('register_data_input', "", -3600, "/");
        setcookie('update_user_data', "", -3600, "/");
        return $this->render('sign_in');
    }
}