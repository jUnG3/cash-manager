<?php

namespace CashManager\Data;


use \Exception;

interface DataStructureReaderInterface
{
    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function getValue(string $name);

    /**
     * @param string $key
     * @return bool
     * @throws Exception
     */
    public function testKey(string $key);
}
