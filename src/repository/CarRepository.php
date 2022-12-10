<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Car.php';

class carRepository extends Repository
{
    public function __construct()
    {
        parent::__constructor();
    }

    public function getId(string $name): ?string
    {
        $stmt = $this->database->connect()->prepare('SELECT id_car FROM public.cars WHERE name = :name');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $carId = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$carId) {
            return null;
        }
        return $carId['id_car'];
    }
}