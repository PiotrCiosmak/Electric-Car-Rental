<?php

class UserData
{
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $street;
    private $houseNumber;
    private $postCode;
    private $town;
    private $apartmentNumber;

    public function __construct(string $firstName, string $lastName, string $phoneNumber, string $street, string $houseNumber, string $apartmentNumber, string $postCode, string $town)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->apartmentNumber = $apartmentNumber;
        $this->postCode = $postCode;
        $this->town = $town;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }

    public function getTown(): string
    {
        return $this->town;
    }

    public function setTown(string $town): void
    {
        $this->town = $town;
    }

    public function getApartmentNumber(): ?string
    {
        return $this->apartmentNumber;
    }

    public function setApartmentNumber(?string $apartmentNumber): void
    {
        $this->apartmentNumber = $apartmentNumber;
    }
}