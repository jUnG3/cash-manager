<?php

namespace CashManager\Currency;

use CashManager\Data\DataStructureInterface;

class Currency
{
    /**
     * @var DataStructureInterface
     */
    private $dataStructure;

    /**
     * Currency constructor.
     * @param DataStructureInterface $dataStructure
     */
    public function __construct(DataStructureInterface $dataStructure)
    {
        $this->dataStructure = $dataStructure;
    }

    /**
     * Returns the currency name
     * @return string
     */
    public function name() : string
    {
        return $this->dataStructure->getValue('currency_name');
    }
}
