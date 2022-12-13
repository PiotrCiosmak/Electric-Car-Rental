<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Rent.php';

class RentRepository extends Repository
{
    public function __construct()
    {
        parent::__constructor();
    }

    public function dateIsFree(Rent $rent): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.rents WHERE id_car = :id_car AND ( (:start_date BETWEEN start_date AND end_date) OR (:end_date BETWEEN start_date AND end_date) OR(:start_date<start_date AND :end_date>end_date) )');
        $stmt->bindParam(':id_car', $_COOKIE['car_id'], PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $rent->getBeginDate(), PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $rent->getEndDate(), PDO::PARAM_STR);
        $stmt->execute();
        $cars = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cars) {
            return true;
        }
        return false;
    }

    public function addRent(Rent $rent): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO rents (start_date, end_date,id_user,id_car)
            VALUES (?,?,?,?)
            ');
        $stmt->execute([$rent->getBeginDate(), $rent->getEndDate(), $rent->getUserID(), $rent->getCarID()]);
    }

    public function getAllUserRentals()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT c.name, r.start_date, r.end_date
            FROM rents AS r
            JOIN cars c on c.id_car = r.id_car
            WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $this->decryptIt($_COOKIE['user_id']), PDO::PARAM_STR);
        $stmt->execute();

        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $row);
        }
        return $result;
    }

    private function decryptIt(string $x): string
    {
        return openssl_decrypt($x, "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
    }
}