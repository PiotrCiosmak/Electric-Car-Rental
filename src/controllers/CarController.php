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

    public function add_new_car()
    {
        if ((strlen($_POST["car-name"]) == 0) || (strlen($_POST["car-price"]) == 0) || (strlen($_POST["car-time-to-100"]) == 0)) {
            return $this->render('admin_panel', ['messages' => ['Błąd! Auto nie zostało dodane!']]);
        }
        if ($_POST["car-price"] < 0 || $_POST["car-time-to-100"] < 0) {
            return $this->render('admin_panel', ['messages' => ['Błąd! Auto nie zostało dodane!']]);
        }
        $tmpImgSrc = str_replace(" ", "_", strtolower($_POST["car-name"]));
        $tmpImgSrc = str_replace("-", "_", $tmpImgSrc);
        $tmpImgSrc = str_replace(".", "_", $tmpImgSrc);
        $car = new Car($_POST["car-name"], $_POST["car-price"], $_POST["car-time-to-100"], $tmpImgSrc);

        $this->carRepository->addCar($car);
        return $this->render('admin_panel', ['messages' => ['Auto zostało dodane!']]);

    }
}