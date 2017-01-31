<?php

use PHPUnit\Framework\TestCase;
use CashManager\Transaction\Transaction;
use CashManager\Data\DataStructure;
use CashManager\Balance\Balance;

class TransactionTest extends TestCase
{
    /**
     * @covers Transaction::withdraw
     * @dataProvider withdrawDataProvider
     */
    public function testWithdraw($a, $b, $result)
    {
        $transaction = new Transaction(
            DataStructure::create(),
            new Balance(DataStructure::create($a)),
            \CashManager\Identifier\Identifier::createIntegerId()
        );
        $transaction->withdraw($b);
        $this->assertEquals($result, $transaction->newBalanceValue());
    }

    /**
     * @param $a
     * @param $b
     * @param $result
     * @covers Transaction::deposit
     * @dataProvider depositDataProvider
     */
    public function testDeposit($a, $b, $result)
    {
        $transaction = new Transaction(
            DataStructure::create(),
            new Balance(DataStructure::create($a)),
            \CashManager\Identifier\Identifier::createIntegerId()
        );
        $transaction->deposit($b);
        $this->assertEquals($result, $transaction->newBalanceValue());
    }

    /**
     * @return array
     */
    public function withdrawDataProvider()
    {
        return [
            'Withdraw 20 from balance' => [['current_state' => 200.00], 20.00, 180.00],
            'Withdraw 30 from balance' => [['current_state' => 200.00], 30.00, 170.00],
            'Withdraw 40 from balance' => [['current_state' => 200.00], 40.00, 160.00],
            'Withdraw 50 from balance' => [['current_state' => 200.00], 50.00, 150.00],
            'Withdraw 60 from balance' => [['current_state' => 200.00], 60.00, 140.00],
        ];
    }

    /**
     * @return array
     */
    public function depositDataProvider()
    {
        return [
            'Deposit 20 from balance' => [['current_state' => 200.00], 20.00, 220.00],
            'Deposit 30 from balance' => [['current_state' => 200.00], 30.00, 230.00],
            'Deposit 40 from balance' => [['current_state' => 200.00], 40.00, 240.00],
            'Deposit 50 from balance' => [['current_state' => 200.00], 50.00, 250.00],
            'Deposit 60 from balance' => [['current_state' => 200.00], 60.00, 260.00],
        ];
    }
}
