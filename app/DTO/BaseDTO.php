<?php

namespace App\DTO;

abstract class BaseDTO
{
    abstract public static function new(...$args);

    final public function toArray()
    {
        return array_filter(
            (array) get_object_vars($this),
            fn ($value) => !is_null($value)
        );
    }
}
