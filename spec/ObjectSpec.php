<?php

namespace spec\PHPSystem\Core;

use PHPSystem\Core\Object;
use PhpSpec\ObjectBehavior;
use spec\PHPSystem\Core\Stub\Person;

class ObjectSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Object::class);
    }

    public function it_equals_between_two_objects_because_they_reference_the_same_object()
    {
        $person1a = new Person('John');
        $person1b = $person1a;

        expect($person1a->equals($person1b))->toBe(true);
    }

    public function it_does_not_equals_between_two_objects_although_they_have_the_same_value()
    {
        $person1a = new Person('John');
        $person2 = new Person((string)$person1a);

        expect($person1a->equals($person2))->toBe(false);
    }

    public function it_serves_as_the_default_hash_function()
    {
        $person1a = new Person('John');

        expect($person1a->hashCode())->toBe(spl_object_hash($person1a));
    }
}
