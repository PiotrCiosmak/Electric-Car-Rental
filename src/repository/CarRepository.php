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

    public function getName(string $id_car)
    {
        $stmt = $this->database->connect()->prepare('SELECT cars.name FROM public.cars WHERE id_car = :id_car');
        $stmt->bindParam(':id_car', $id_car, PDO::PARAM_STR);
        $stmt->execute();
        $name = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$name) {
            return null;
        }
        return $name['name'];
    }

}