<?php

class Rent
{
    private $beginDate;
    private $endDate;
    private $userID;
    private $carID;

    public function __construct(string $beginDate, string $endDate, int $userID, int $carID)
    {
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->userID = $userID;
        $this->carID = $carID;
    }

    public function getBeginDate(): string
    {
        return $this->beginDate;
    }

    public function setBeginDate(string $beginDate): void
    {
        $this->beginDate = $beginDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getUserID(): int
    {
        return $this->userID;
    }

    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }

    public function getCarID(): int
    {
        return $this->carID;
    }

    public function setCarID(int $carID): void
    {
        $this->carID = $carID;
    }


}