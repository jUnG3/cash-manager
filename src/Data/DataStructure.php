<?php

namespace CashManager\Data;

use Exception;

class DataStructure implements DataStructureInterface
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
    private function __construct($data = [])
    {
        $this->plainDataStructure = $data;
    }

    /**
     * @param array $data
     * @return DataStructure
     */
    public static function create(array $data = [])
    {
        return new static($data);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function testKey(string $key) : bool
    {
        return array_key_exists($key, $this->plainDataStructure);
    }

    /**
     * Returns the value for the given name
     * @param string $name
     * @return null|mixed
     * @throws Exception
     */
    public function getValue(string $name)
    {
        if (!$this->testKey($name)) {
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
