<?php

require_once "AppController.php";
require_once __DIR__ . "/../models/User.php";

class SecurityController extends AppController
{
    public function register_check()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $regex = preg_match('[@]', $email);
        if ($regex) {
        } else {
            return $this->render('register', ['messages' => ['Incorrect email!']]);
        }

        if (strlen($password) < 8) {
            return $this->render('register', ['messages' => ['Password is too short!']]);
        }

        //hasło musi mieć jeden wielki jeden mały i jednen specjalny znak
        /*        if(email jest w bazie)
                  {
                    return $this->render('register',['messages'=>['There is already an account at the address. Go to the sign up page.']]);
                   }*/

        //załadowanie do bazy danych

        return $this->render('register_data_input');
    }

    public function register_data_input_check()
    {

    }
}