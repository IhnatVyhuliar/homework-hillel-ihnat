<?php

namespace Classes;

use Traits\Trait1;
use Traits\Trait2;
use Traits\Trait3;

class Test{
    use Trait1, Trait2, Trait3{
        Trait1::test as protected testFromTrait1;
        Trait2::test as protected testFromTrait2;
        Trait3::test as protected testFromTrait3;

        Trait1::test insteadof Trait2;
        Trait1::test insteadof Trait3;
    }

    public function getSum(): int
    {
        return $this->testFromTrait1() + $this->testFromTrait2() + $this->testFromTrait3(); //+ $this->test_trait_3();
    }
}