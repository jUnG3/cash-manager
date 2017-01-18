<?php

namespace CashManager\Identifier;


interface IdentifierInterface
{
    /**
     * @return int
     */
    public static function createIntegerId();
}
