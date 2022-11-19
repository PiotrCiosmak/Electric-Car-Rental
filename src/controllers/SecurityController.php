<?php

require_once "AppController.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/UserData.php";

class SecurityController extends AppController
{
    public function register_check()
    {
        $user = new User($_POST["email"], $_POST["password"]);

        $emailRegex = preg_match('[@]', $user->getEmail());
        if (!$emailRegex) {
            return $this->render('register', ['messages' => ['Niepoprawny adres email!']]);
        }

        if (strlen($user->getPassword()) < 8) {
            return $this->render('register', ['messages' => ['Hasło jest zbyt krótki!']]);
        }

        //Sprawdzenie czy email nie jest zajęty
        /*        if(getEmail jest w bazie)
                  {
                    return $this->render('register',['messages'=>['Istnieje już konto powiązane z tym adresem email. Przejdź do strony logowania.']]);
                   }*/

        //Załadowanie danych do bazy danych

        return $this->render('register_data_input');
    }

    public function register_data_input_check()
    {
        $userData = new UserData($_POST["first-name"], $_POST["last-name"], $_POST["phone-numer"], $_POST["street"], $_POST["house-number"], $_POST["apartment-number"], $_POST["post-code"], $_POST["city"]);

        if (strlen($userData->getFirstName()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź imie!']]);
        if (strlen($userData->getLastName()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź nazwisko!']]);
        if (strlen($userData->getPhoneNumber()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź numer telefonu!']]);
        if (strlen($userData->getStreet()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź ulicę!']]);
        if (strlen($userData->getHouseNumber()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź numer domu!']]);
        if (strlen($userData->getPostCode()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź kod pocztowy!']]);
        if (strlen($userData->getTown()) == 0)
            return $this->render('register_data_input', ['messages' => ['Wprowadź miejscowość!']]);

        //Załadowanie danych do bazy danych
        return $this->render('main_page');
    }

    public function sign_in_check()
    {
        $user = new User($_POST["email"], $_POST["password"]);
        //sprawdzenie czy sa takie dane w bazie
        /*        if(getEmial nie jest w bazie)
           {
             return $this->render('sign_in',['messages'=>['Niepoprawne dane. Spróbuj ponownie']]);
            }*/
        return $this->render('main_page');
    }
}