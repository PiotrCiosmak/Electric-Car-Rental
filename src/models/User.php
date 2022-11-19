<?php

class User
{
    private $email;
    private $password;
    private $firstName;
    private $LastName;
    private $phoneNumber;
    private $street;
    private $houseNumber;
    private $apartmentNumber;
    private $postCode;
    private $town;

    public function __construct(string $email, string $password, string $firstName, string $LastName, string $phoneNumber, string $street, string $houseNumber, string $apartmentNumber, string $postCode, string $town)
    {
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->LastName = $LastName;
        $this->phoneNumber = $phoneNumber;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->apartmentNumber = $apartmentNumber;
        $this->postCode = $postCode;
        $this->town = $town;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName)
    {
        $this->LastName = $LastName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    public function getApartmentNumber(): string
    {
        return $this->apartmentNumber;
    }

    public function setApartmentNumber(string $apartmentNumber)
    {
        $this->apartmentNumber = $apartmentNumber;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode)
    {
        $this->postCode = $postCode;
    }

    public function getTown(): string
    {
        return $this->town;
    }

    public function setTown(string $town)
    {
        $this->town = $town;
    }


}