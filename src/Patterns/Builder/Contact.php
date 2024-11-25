<?php

namespace Patterns\Builder;

class Contact {
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $address;

    public function name(string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    public function surname(string $surname): Contact
    {
        $this->surname = $surname;
        return $this;
    }

    public function email(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    public function phone(string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    public function address(string $address): Contact
    {
        $this->address = $address;
        return $this;
    }
    
    private function checkParamsSet(): bool
    {
        return isset($this->name, $this->surname, $this->email, $this->phone, $this->address);
    }

    public function build(): array
    {
        if (!$this->checkParamsSet()){
            return array();
        }
        return array(
            "name" =>    $this->name, 
            "surname" => $this->surname,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address
        );
    }
}