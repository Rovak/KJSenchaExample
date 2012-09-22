<?php

namespace Application\Direct;

/**
 * Named Arguments example
 */
class NamedArguments
{
    public function showDetails($values)
    {
        return sprintf(
            'Hi %s %s, you are %d years old', 
            $values['firstName'],
            $values['lastName'],
            $values['age']
        );
    }
}