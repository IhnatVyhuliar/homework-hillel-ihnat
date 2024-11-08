<?php

namespace Classes;
use Exceptions\CustomException;
use ReflectionClass;

class User
{
    private string $name;
    private int $age;
    private string $email = '';

    public function __call($name, $arguments)
    {
        $reflection = new ReflectionClass($this);

        if(!$reflection->hasMethod($name))
        {
            throw new CustomException("Method does not exist", 500);
        }
        if($reflection->getMethod($name)->getReturnType()->getName() === "void")
        {
            call_user_func_array([$this, $name], $arguments);
        }else{
            return call_user_func_array([$this, $name], $arguments);
        }
        
    }
    
    public function getAll(): array
    {
        return [
            'name' => $this->getName(),
            'age' => $this->getAge(),
            'email' => $this->getEmail()
        ];
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAge(int $age): void
    {
        $this->checkInteger($age);
        $this->age = $age;
    }

    private function getName(): string
    {
        return $this->name;
    }

    private function getAge(): int
    {
        return $this->age;
    }

    private function getEmail(): string
    {
        return $this->email;
    }

    private function checkInteger(int $age): void
    {
        if(!filter_var($age, FILTER_VALIDATE_INT) || $age<0){
            throw new CustomException("Number is not valid");
        }
    }
}

