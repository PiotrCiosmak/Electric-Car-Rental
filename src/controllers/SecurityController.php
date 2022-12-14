<?php

require_once "AppController.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/UserData.php";
require_once __DIR__ . "/../models/Car.php";
require_once __DIR__ . "/../models/Rent.php";
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/UserDataRepository.php";
require_once __DIR__ . "/../repository/RentRepository.php";
require_once __DIR__ . "/../repository/CarRepository.php";

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


        $passwordRegex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/';
        if (!(preg_match($passwordRegex, $_POST["password"]))) {
            return $this->render('register', ['messages' => ['Hasło musi zawierać od 8 do 16 znaków, wielką literę, małą literę, cyfrę i znak specjalny']]);
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

    public function update_user_data_check()
    {
        $userData = new UserData($_POST["first-name"], $_POST["last-name"], $_POST["phone-numer"], $_POST["street"], $_POST["house-number"], $_POST["apartment-number"], $_POST["post-code"], $_POST["city"], $this->decryptIt($_COOKIE['user_id']));
        if ((strlen($userData->getFirstName()) == 0) || (strlen($userData->getLastName()) == 0) || (strlen($userData->getPhoneNumber()) == 0) || (strlen($userData->getStreet()) == 0) || (strlen($userData->getHouseNumber()) == 0) || (strlen($userData->getPostCode()) == 0) || (strlen($userData->getTown()) == 0)) {
            return $this->render('update_user_data', ['messages' => ['Uzupełnij wszystkie pola!']]);
        }
        $userDataRepository = new UserDataRepository();
        $userDataRepository->updateUserData($userData);

        return $this->render('account');
    }

    public function change_password_check()
    {
        $oldPassword = $_POST['old-password'];
        $firstNewPassword = $_POST['new-password-1'];
        $secondNewPassword = $_POST['new-password-2'];
        if ((strlen($oldPassword) < 1) || (strlen($firstNewPassword) < 1) || (strlen($secondNewPassword) < 1)) {
            return $this->render('account', ['messages' => ['Wszystkie wymagane pola nie zostały uzupełnione!']]);
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUserById($this->decryptIt($_COOKIE['user_id']));

        if (!password_verify($oldPassword, $user->getPassword())) {
            return $this->render('account', ['messages' => ['Stare hasło jest niepoprawne!']]);
        }


        if (!($firstNewPassword === $secondNewPassword)) {
            return $this->render('account', ['messages' => ['Nowe hasła nie są identyczne!']]);
        }

        $passwordRegex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/';
        if (!(preg_match($passwordRegex, $firstNewPassword))) {
            return $this->render('account', ['messages' => ['Nowe hasło musi zawierać od 8 do 16 znaków, wielką literę, małą literę, cyfrę i znak specjalny']]);
        }

        $userRepository->updatePassword(password_hash($firstNewPassword, PASSWORD_BCRYPT, ['cost' => 12,]));
        return $this->render('account', ['messages' => ['Hasło zostało zaktualizowane']]);
    }

    public
    function sign_in_check()
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
        if ($rentRepository->dateIsFree($rent)) {
            $rentRepository->addRent($rent);
            $tmpUserRepository = new UserRepository();
            $email = $tmpUserRepository->getEmail($this->decryptIt($_COOKIE['user_id']));
            $tmpCarRepository = new CarRepository();
            $name = $tmpCarRepository->getName($_COOKIE['car_id']);
            $msg = 'Zarezerwowano ' . $name . ' od ' . $rent->getBeginDate() . ' do ' . $rent->getEndDate() . '. Rezerwacja dokonana na maila ' . $email;
            return $this->render('booking', ['messages' => [$msg]]);
        } else {
            return $this->render('booking', ['messages' => ['Brak możliwości dokonania rezerwacji w tym terminie']]);
        }
    }

    public function admin_panel_check()
    {
        $tmpUserRepository = new UserRepository();
        if (!$tmpUserRepository->isAdmin()) {
            return $this->render('account', ['messages' => ['Brak uprawnień!']]);
        } else {
            return $this->render('admin_panel');

        }
    }

    public function change_car_price()
    {
        if (strlen($_POST['car-price']) < 1) {
            return $this->render('admin_panel', ['messages' => ['Uzupełnij wymagane pola!']]);
        }

        $tmpCar = new Car($_POST['car-name'], $_POST['car-price']);

        if ($tmpCar->getPrice() < 0) {
            return $this->render('admin_panel', ['messages' => ['Cena nie może być wartością ujemną!']]);
        }
        $tmpCarRepository = new CarRepository();
        $tmpCarRepository->updatePrice($tmpCar);
        return $this->render('admin_panel', ['messages' => ['Cena została zaktualizowana!']]);
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