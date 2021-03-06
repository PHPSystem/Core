<?php
declare(strict_types=1);

namespace PHPSystem\Core;

/**
 * Supports all classes in the PHPSystem class hierarchy and provides
 * low-level services to derived classes.
 *
 * This is the ultimate base class of all classes in the PHPSystem;
 * it is the root of the type hierarchy.
 */
class Object
{
    /*
     * Determines whether the specified object is equal to the current object.
     */
    public function equals(Object $object): bool
    {
        return $this === $object;
    }

    /**
     * A hash code for the current object
     */
    public function hashCode(): string
    {
        return spl_object_hash($this);
    }
}
