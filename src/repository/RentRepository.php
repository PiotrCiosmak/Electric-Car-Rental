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
        return true;
    }


    public function addRent(Rent $rent): void
    {
        //TODO
    }
}