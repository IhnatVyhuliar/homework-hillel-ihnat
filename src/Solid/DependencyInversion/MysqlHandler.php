<?php

namespace Solid\DependencyInversion;
use Solid\DependencyInversion\Interfaces\Database;

class MySQLHandler implements Database
{
    public function getData()
    {
        return 'some data from database';
    }
}