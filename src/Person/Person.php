<?php


namespace CashManager\Person;

use CashManager\Data\DataStructureInterface;
use DateTimeZone;

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
     * @return DateTimeZone
     * @throws \Exception
     */
    public function timezone() : DateTimeZone
    {
        return $this->dataStructure->getValue('timezone');
    }
}
