<?php

namespace CashManager\Data;

use CashManager\Factory\CreateObjectInterface;

class DataStructureFactory implements CreateObjectInterface
{
    /**
     * @param array $data
     * @return DataStructure
     */
    public static function create(array $data = [])
    {
        return new DataStructure($data);
    }
}
