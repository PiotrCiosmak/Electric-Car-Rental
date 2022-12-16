<?php

class Car
{
    private $name;
    private $price;

    private $timeTo100;
    private $imgSource;

    public function __construct(string $name, float $price, float $timeTo100 = 0, string $imgSource = "")
    {
        $this->name = $name;
        $this->price = $price;
        $this->timeTo100 = $timeTo100;
        $this->imgSource = $imgSource;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getTimeTo100(): float
    {
        return $this->timeTo100;
    }

    public function setTimeTo100(float $timeTo100): void
    {
        $this->timeTo100 = $timeTo100;
    }

    public function getImgSource(): string
    {
        return $this->imgSource;
    }

    public function setImgSource(string $imgSource): void
    {
        $this->imgSource = $imgSource;
    }
}