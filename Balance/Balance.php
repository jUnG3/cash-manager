<?php

namespace Balance;

use Exception;
use Data\DataStructure;

class Balance
{
    /**
     * @var \Data\DataStructure
     */
    private $balanceData;

    /**
     * Balance constructor.
     * @param DataStructure $dataStructure
     */
    public function __construct(DataStructure $dataStructure)
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
