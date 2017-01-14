<?php

namespace Data;


use \Exception;

interface DataStructureReaderInterface
{
    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function getValue(string $name);
}
