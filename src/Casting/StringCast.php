<?php

namespace WendellAdriel\ValidatedDTO\Casting;

use Throwable;
use WendellAdriel\ValidatedDTO\Exceptions\CastException;

class StringCast implements Castable
{
    /**
     * @throws CastException
     */
    public function cast(string $property, mixed $value): string
    {
        try {
            return (string) $value;
        } catch (Throwable) {
            throw new CastException($property);
        }
    }
}
