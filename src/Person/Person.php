<?php


namespace CashManager\Person;

use CashManager\Data\DataStructureInterface;
use Exception;

class Person
{
    /**
     * @var DataStructureInterface
     */
    private $dataStructure;

    /**
     * Person constructor.
     * @param DataStructureInterface $dataStructure
     */
    public function __construct(DataStructureInterface $dataStructure)
    {
        $this->dataStructure = $dataStructure;
    }

    /**
     * @return string
     */
    public function name() : string
    {
        return $this->dataStructure->getValue('person_name');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function timezone() : string
    {
        return $this->dataStructure->getValue('timezone');
    }
}
