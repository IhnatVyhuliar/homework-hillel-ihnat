<?php

namespace Solid\DependencyInversion;
use Solid\DependencyInversion\Interfaces\Database;

class Controller
{
    private Database $adapter;

    public function __construct(Database $db)
    {
        $this->adapter = $db;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}