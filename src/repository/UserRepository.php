<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__constructor();
    }

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

    public function getUserById(string $id_user): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.users WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
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

    public function updatePassword(string $password): void
    {
        $stmt = $this->database->connect()->prepare('
                    UPDATE public.users
                    SET password = :password
                    WHERE id_user = :id_user
                    ');
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getEmail(string $id_user)
    {
        $stmt = $this->database->connect()->prepare('SELECT email FROM public.users WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();
        $email = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$email) {
            return null;
        }
        return $email['email'];
    }

    public function addUser(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password)
            VALUES (?,?)
            ');
        $stmt->execute([$user->getEmail(), $user->getPassword()]);
    }

    public function getId(string $email): ?string
    {

        $stmt = $this->database->connect()->prepare('SELECT id_user FROM public.users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $userId = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userId) {
            return null;
        }
        return $userId['id_user'];
    }

    private function decryptIt(string $x): string
    {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}