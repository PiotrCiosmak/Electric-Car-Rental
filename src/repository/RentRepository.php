<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Rent.php';

class RentRepository extends Repository
{
    public function __construct()
    {
        parent::__constructor();
    }

    public function DateIsFree(Rent $rent): bool
    {
        //TODO
        //zwracam tblice z wszystkimi rekordmi gdzie id_car = temu z cookie
        //do tego warunek że data poczatkowa nowa musi być wcześniej niż data końcowa
        //do tego warunerk że data końcowa nowego musi być wcześniejsza niż data początkowa tego z bazy
        return true;
    }


    public function addRent(Rent $rent): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO rents (start_date, end_date,id_user,id_car)
            VALUES (?,?,?,?)
            ');
        $stmt->execute([$rent->getBeginDate(), $rent->getEndDate(), $rent->getUserID(), $rent->getCarID()]);
    }
}