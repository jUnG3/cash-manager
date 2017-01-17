<?php

namespace CashManager\Transaction;

use CashManager\Balance\Balance;
use CashManager\Data\DataStructure;
use DateTime;
use Ramsey\Uuid\Uuid;

class Transaction
{
    /**
     * @var DataStructure
     */
    private $transactionData;
    /**
     * @var Balance
     */
    private $openingBalance;

    /**
     * Transaction constructor.
     * @param DataStructure $data
     * @param Balance $balance
     */
    public function __construct(DataStructure $data, Balance $balance = null)
    {
        $this->transactionData = $data;
        $this->openingBalance = $balance;
        $this->transactionData->setValue('transaction_id', Uuid::uuid4()->getInteger());
    }

    /**
     * Returns the beginning balance
     * @return Balance
     * @throws \Exception
     */
    public function openingBalance() : Balance
    {
        return $this->openingBalance;
    }

    /**
     * Withdraws amount from transaction
     * @param float $amount
     */
    public function withdraw(float $amount)
    {
        $this->transactionData->setValue('withdraw', $amount);
        $this->removeFromBalance($amount);
        $this->markTransaction('withdraw');
        $this->addTimestamp();
    }

    /**
     * Adds amount to transaction
     * @param float $amount
     */
    public function deposit(float $amount)
    {
        $this->transactionData->setValue('deposit', $amount);
        $this->addToBalance($amount);
        $this->markTransaction('deposit');
        $this->addTimestamp();
    }

    /**
     * Adds amount to balance
     * @param float $amount
     */
    private function addToBalance(float $amount)
    {
        $this->transactionData->setValue(
            'new_balance',
            $this->openingBalance()->currentBalance() + $amount
        );
    }

    /**
     * Removes amount from balance
     * @param float $amount
     */
    private function removeFromBalance(float $amount)
    {
        $this->transactionData->setValue(
            'new_balance',
            $this->openingBalance()->currentBalance() - $amount
        );
    }

    /**
     * @param string $mark
     */
    private function markTransaction(string $mark)
    {
        $this->transactionData->setValue('transaction_type', $mark);
    }

    /**
     * Adds an timestamp to the transaction
     */
    private function addTimestamp()
    {
        $this->transactionData->setValue('created_on', (new DateTime())->format('Y-m-d H:i:s'));
    }
}
