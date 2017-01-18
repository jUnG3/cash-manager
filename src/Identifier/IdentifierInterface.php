<?php

namespace CashManager\Identifier;


interface Identifier
{
    /**
     * @return int
     */
    public static function createIntegerId();
}