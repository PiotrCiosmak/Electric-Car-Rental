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

    public function getAllNames()
    {
        $stmt = $this->database->connect()->prepare('SELECT cars.name FROM public.cars');
        $stmt->execute();
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $row);
        }
        return $result;
    }

    public function getPrice()
    {
        $stmt = $this->database->connect()->prepare('SELECT cars.price FROM public.cars WHERE id_car = :id_car');
        $stmt->bindParam(':id_car', $_COOKIE['car_id'], PDO::PARAM_STR);
        $stmt->execute();
        $price = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$price) {
            return null;
        }
        return $price['price'];
    }

    public function updatePrice(Car $newCar)
    {
        $stmt = $this->database->connect()->prepare('
                    UPDATE public.cars
                    SET price = :price
                    WHERE name = :name
                    ');
        $stmt->bindParam(':price', $newCar->getPrice(), PDO::PARAM_STR);
        $stmt->bindParam(':name', $newCar->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getFinalPrice(float $percent)
    {
        $start_price = $this->getPrice();
        return $this->roundToHundreds(strval($start_price * $percent));
    }

    public function getAllCars()
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.cars');
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cars as $car) {
            $result[] = new Car(
                $car['name'],
                $car['price'],
                $car['timeTo100'],
                $car['img_source']
            );
        }
        return $result;
    }

    public function getCarsByName(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.cars WHERE LOWER(name) LIKE :searchString');
        $stmt->bindParam(':searchString', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCar(Car $car)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO cars (name, price, "timeTo100" ,img_source)
            VALUES (?,?,?,?)
            ');
        $stmt->execute([$car->getName(), $car->getPrice(), $car->getTimeTo100(), $car->getImgSource()]);
    }

    private function roundToHundreds(string $strval)
    {
        return round(intval($strval) / 100) * 100. . " zł";
    }
}