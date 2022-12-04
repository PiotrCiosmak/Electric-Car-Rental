<?php

require_once "AppController.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/UserData.php";
require_once __DIR__ . "/../models/Car.php";
require_once __DIR__ . "/../models/Rent.php";
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/UserDataRepository.php";

class SecurityController extends AppController
{
    public function __construct()
    {
        parent::__constructor();
    }

    public function register_check()
    {
        $user = new User(strtolower($_POST["email"]), password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 12,]));
        if ((strlen($user->getEmail()) < 1) || (strlen($user->getPassword()) < 1)) {
            return $this->render('register', ['messages' => ['Wszystkie wymagane pola nie zostały uzupełnione!']]);
        }

        $emailRegex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (!(preg_match($emailRegex, $user->getEmail()))) {
            return $this->render('register', ['messages' => ['Niepoprawny adres email!']]);
        }

        //TODO sprawdzenie czy haslo ma 1 wielki, 1 mała, 1 znak specialny, 1 cyfre
        /*        $passwordRegex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
                if (!(preg_match($passwordRegex, $user->getPassword()))) {
                    return $this->render('register', ['messages' => ['Niepoprawne hasło!!']]);
                }*/

        $tmpUserRepository = new UserRepository();

        $tmpUser = $tmpUserRepository->getUser($user->getEmail());

        if ($tmpUser) {
            return $this->render('register', ['messages' => ['Ten adres email jest juz zajęty!']]);
        }

        $userRepository = new UserRepository();
        $userRepository->addUser($user);

        return $this->render('register_data_input');
    }

    public function register_data_input_check()
    {
        //ZAMIAST 12 === $_SESSION['user_id']
        $userData = new UserData($_POST["first-name"], $_POST["last-name"], $_POST["phone-numer"], $_POST["street"], $_POST["house-number"], $_POST["apartment-number"], $_POST["post-code"], $_POST["city"], 1);

        if ((strlen($userData->getFirstName()) == 0) || (strlen($userData->getLastName()) == 0) || (strlen($userData->getPhoneNumber()) == 0) || (strlen($userData->getStreet()) == 0) || (strlen($userData->getHouseNumber()) == 0) || (strlen($userData->getPostCode()) == 0) || (strlen($userData->getTown()) == 0)) {
            return $this->render('register_data_input', ['messages' => ['Uzupełnij wszystkie pola!']]);
        }

        $userDataRepository = new UserDataRepository();
        $userDataRepository->addUserData($userData);
        return $this->render('main_page');
    }

    public function sign_in_check()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ((strlen($email) < 1) || (strlen($password) < 1)) {
            return $this->render('sign_in', ['messages' => ['Wszystkie wymagane pola nie zostały uzupełnione!']]);
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('sign_in', ['messages' => ['Taki użytkownik nie istnieje!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('sign_in', ['messages' => ['Niepoprawne hasło!']]);
        }
        session_start();
        $_SESSION['user_id'] = $userRepository->getId($email);
        return $this->render('main_page');
    }

    public function booking_check()
    {
        //Sprawdzić czy data nie jest ubiegła lub czy nie jest podana data na minusie
        //zamiast 1 zwrócić id aktualnie zalogowanie użytkownika
        //zamiast 2 zwrócić id aktualnie wybranego auta
        if ((strlen($_POST["start-date"]) < 1) || (strlen($_POST["end-date"]) < 1))
            return $this->render('booking', ['messages' => ['Data wynajmu nie została poprawnie wybrana']]);

        $rent = new Rent($_POST["start-date"], $_POST["end-date"], 1, 2);

        //sprawdzenie czy data wynajmu nie zachodzi na jakieś wynajem który jest w bazie

        //jeśli koliduje
        //return $this->render('booking',['messages'=>['Brak możliwości dokonania rezerwacji w tym terminie']]);

        //jesli nie koliduje
        //zapisać wynajem w bazie
        return $this->render('booking', ['messages' => ['Potwierdzenie dokonania rezerwacja']]);

    }
}