<?php

namespace CashManager\Balance;

use Exception;
use CashManager\Data\DataStructureInterface;

class Balance
{
    /**
     * @var DataStructureInterface
     */
    private $balanceData;

    /**
     * Balance constructor.
     * @param DataStructureInterface $dataStructure
     */
    public function __construct(DataStructureInterface $dataStructure)
    {
        $this->balanceData = $dataStructure;
    }

    /**
     * @return float
     * @throws Exception
     */
    public function currentBalance() : float
    {
        return $this->balanceData->getValue('current_state');
    }
}
