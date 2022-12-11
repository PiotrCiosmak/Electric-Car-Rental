<?php

require_once "AppController.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/UserData.php";
require_once __DIR__ . "/../models/Car.php";
require_once __DIR__ . "/../models/Rent.php";
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/UserDataRepository.php";
require_once __DIR__ . "/../repository/RentRepository.php";

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


        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        if (!(preg_match($passwordRegex, $_POST["password"]))) {
            return $this->render('register', ['messages' => ['Hasło musi składać się z  ośmiu znaków, wielkich liter, małych liter i cyfr']]);
        }

        $tmpUserRepository = new UserRepository();

        $tmpUser = $tmpUserRepository->getUser($user->getEmail());

        if ($tmpUser) {
            return $this->render('register', ['messages' => ['Ten adres email jest juz zajęty!']]);
        }

        $userRepository = new UserRepository();
        $userRepository->addUser($user);


        $cookie_name = "user_id";
        $cookie_value = $this->encryptIt($userRepository->getId($user->getEmail()));
        setcookie($cookie_name, $cookie_value, 0, "/");
        return $this->render('register_data_input');
    }

    public function register_data_input_check()
    {
        $userData = new UserData($_POST["first-name"], $_POST["last-name"], $_POST["phone-numer"], $_POST["street"], $_POST["house-number"], $_POST["apartment-number"], $_POST["post-code"], $_POST["city"], $this->decryptIt($_COOKIE['user_id']));

        if ((strlen($userData->getFirstName()) == 0) || (strlen($userData->getLastName()) == 0) || (strlen($userData->getPhoneNumber()) == 0) || (strlen($userData->getStreet()) == 0) || (strlen($userData->getHouseNumber()) == 0) || (strlen($userData->getPostCode()) == 0) || (strlen($userData->getTown()) == 0)) {
            return $this->render('register_data_input', ['messages' => ['Uzupełnij wszystkie pola!']]);
        }

        $userDataRepository = new UserDataRepository();
        $userDataRepository->addUserData($userData);

        $cookie_name = "register_data_input";
        $cookie_value = 1;
        setcookie($cookie_name, $cookie_value, 0, "/");
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

        $cookie_name = "user_id";
        $cookie_value = $this->encryptIt($userRepository->getId($user->getEmail()));
        setcookie($cookie_name, $cookie_value, 0, "/");

        $cookie_name = "register_data_input";
        $cookie_value = 1;
        setcookie($cookie_name, $cookie_value, 0, "/");
        return $this->render('main_page');
    }

    public function booking_check()
    {
        $rent = new Rent($_POST["start-date"], $_POST["end-date"], $this->decryptIt($_COOKIE['user_id']), $_COOKIE['car_id']);

        if ((strlen($rent->getBeginDate()) < 1) || (strlen($rent->getEndDate()) < 1))
            return $this->render('booking', ['messages' => ['Data wynajmu nie została poprawnie wybrana']]);

        if (($rent->getBeginDate() >= $rent->getEndDate()) || ($rent->getBeginDate() < date('Y-m-d '))) {
            return $this->render('booking', ['messages' => ['Niepoprawna data wynajmu']]);
        }

        $rentRepository = new RentRepository();
        if ($rentRepository->DateIsFree($rent)) {
            $rentRepository->addRent($rent);
            //TODO dodać napis z jakiego maila została rezerwacja zrobione
            //TODO dodac napis jakie auto zostało zarezerownane
            //TODO dodac napis na jaki czas została rezerwacja zrbione
            return $this->render('booking', ['messages' => ['Potwierdzenie dokonania rezerwacja']]);
        } else {
            return $this->render('booking', ['messages' => ['Brak możliwości dokonania rezerwacji w tym terminie']]);
        }
    }

    private function encryptIt(?string $x): string
    {

        return strval(openssl_encrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'));
    }

    private function decryptIt(string $x): string
    {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}