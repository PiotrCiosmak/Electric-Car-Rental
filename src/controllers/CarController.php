<?php
require_once __DIR__ . "/../repository/CarRepository.php";

class CarController extends AppController
{

    private $carRepository;

    public function __construct()
    {
        parent::__constructor();
        $this->carRepository = new CarRepository();
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->carRepository->getCarsByName($decoded['search']));
        }

    }
}