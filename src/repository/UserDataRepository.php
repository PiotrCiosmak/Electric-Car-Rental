<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/UserData.php';

class UserDataRepository extends Repository
{
    public function __construct()
    {
        parent::__constructor();
    }

    //TODO coś nie działa chyba
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
        );
    }

    public function addUserData(UserData $userData): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_data (first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user)
            VALUES (?,?,?,?,?,?,?,?,?);
            ');
        $stmt->execute([$userData->getFirstName(), $userData->getLastName(), $userData->getPostCode(), $userData->getStreet(), $userData->getHouseNumber(), $userData->getApartmentNumber(), $userData->getPostCode(), $userData->getTown(), $userData->getIdUser()]);
    }

    public function getFirstName()
    {
        $stmt = $this->database->connect()->prepare('SELECT first_name FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $first_name = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$first_name) {
            return null;
        }
        return $first_name['first_name'];
    }

    public function getLastName()
    {
        $stmt = $this->database->connect()->prepare('SELECT last_name FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $last_name = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$last_name) {
            return null;
        }
        return $last_name['last_name'];
    }

    public function getPhoneNumber()
    {
        $stmt = $this->database->connect()->prepare('SELECT phone_number FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $phone_number = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$phone_number) {
            return null;
        }
        return $phone_number['phone_number'];
    }

    public function getStreet()
    {
        $stmt = $this->database->connect()->prepare('SELECT street FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $street = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$street) {
            return null;
        }
        return $street['street'];
    }

    public function getHouseNumber()
    {
        $stmt = $this->database->connect()->prepare('SELECT house_number FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $house_number = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$house_number) {
            return null;
        }
        return $house_number['house_number'];
    }

    public function getApartmentNumber()
    {
        $stmt = $this->database->connect()->prepare('SELECT apartment_number FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $apartment_number = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$apartment_number) {
            return null;
        }

        if (strlen($apartment_number['house_number']) === 0) {
            return "brak";
        }
        return $apartment_number['house_number'];
    }

    public function getPostCode()
    {
        $stmt = $this->database->connect()->prepare('SELECT post_code FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $post_code = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post_code) {
            return null;
        }
        return $post_code['post_code'];
    }

    public function getTown()
    {
        $stmt = $this->database->connect()->prepare('SELECT town FROM public.users_data WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
        $town = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$town) {
            return null;
        }
        return $town['town'];
    }

    private function decryptIt(string $x): string
    {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}