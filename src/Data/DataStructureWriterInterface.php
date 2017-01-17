<?php

namespace CashManager\Data;


interface DataStructureWriterInterface
{
    /**
     * @param $name
     * @param $value
     */
    public function setValue($name, $value);
}
