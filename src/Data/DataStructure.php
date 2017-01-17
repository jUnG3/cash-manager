<?php

namespace CashManager\Data;

use \Exception;

class DataStructure implements DataStructureReaderInterface, DataStructureWriterInterface
{
    /**
     * Represents plain data organized as key value array
     * @var array
     */
    private $plainDataStructure;

    /**
     * DataStructure constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->plainDataStructure = $data;
    }

    /**
     * Returns the value for the given name
     * @param string $name
     * @return null|mixed
     * @throws \Exception
     */
    public function getValue(string $name)
    {
        if (!array_key_exists($name, $this->plainDataStructure)) {
            throw new Exception('Key ' . $name . ' can not be found');
        }
        return $this->plainDataStructure[$name];
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setValue($name, $value)
    {
        $this->plainDataStructure[$name] = $value;
    }
}
