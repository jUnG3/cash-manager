<?php

namespace CashManager\Identifier;


class Identifier implements IdentifierInterface
{
    /**
     * Identifier constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return int
     */
    public static function createIntegerId()
    {
        return random_int(0, PHP_INT_MAX);
    }
}
