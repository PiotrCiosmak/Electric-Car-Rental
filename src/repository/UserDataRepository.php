<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/UserData.php';

class UserDataRepository extends Repository
{
    public function __construct()
    {
        parent::__constructor();
    }

    /*    public function getUser(string $email): ?User
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
        }*/

    public function addUserData(UserData $userData): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_data (first_name, last_name, phone_number, street, house_number, apartment_number, post_code, town, id_user)
            VALUES (?,?,?,?,?,?,?,?,?);
            ');
        $stmt->execute([$userData->getFirstName(), $userData->getLastName(),$userData->getPostCode(),$userData->getStreet(),$userData->getHouseNumber(), $userData->getApartmentNumber(), $userData->getPostCode(), $userData->getTown(), $userData->getIdUser()]);
    }
}