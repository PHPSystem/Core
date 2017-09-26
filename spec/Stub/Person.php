<?php
declare(strict_types=1);

namespace spec\PHPSystem\Core\Stub;

use PHPSystem\Core\Object;

class Person extends Object
{
    private $personName;

    public function __construct(string $name)
    {
        $this->personName = $name;
    }

    public function __toString()
    {
        return $this->personName;
    }
}
