<?php

use PHPUnit\Framework\TestCase;
use Transaction\Transaction;
use Data\DataStructureFactory;

class TransactionTest extends TestCase
{
    /**
     * @dataProvider withdrawDataProvider
     */
    public function testWithdraw()
    {

    }

    public function withdrawDataProvider()
    {
        return [
            'Withdraw 20 from balance' => []
        ];
    }
}
