<?php

namespace Transaction;

use Balance\Balance;
use Data\DataStructure;
use Data\DataStructureFactory;
use DateTime;

class Transaction
{
    /**
     * @var DataStructure
     */
    private $transactionData;

    /**
     * Transaction constructor.
     * @param DataStructure $data
     */
    public function __construct(DataStructure $data)
    {
        $this->transactionData = $data;
    }

    /**
     * Returns the beginning balance
     * @return Balance
     * @throws \Exception
     */
    public function openingBalance() : Balance
    {
        return $this->transactionData->getValue('opening_balance');
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
        $tmp = $this->openingBalance()->currentBalance() + $amount;
        $this->transactionData->setValue(
            'new_balance',
            new Balance(DataStructureFactory::create(['current_state' => $tmp]))
        );
    }

    /**
     * Removes amount from balance
     * @param float $amount
     */
    private function removeFromBalance(float $amount)
    {
        $tmp = $this->openingBalance()->currentBalance() - $amount;
        $this->transactionData->setValue(
            'new_balance',
            new Balance(DataStructureFactory::create(['current_state' => $tmp]))
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
        $this->transactionData->setValue('created_on', (new DateTime())->format('Y-d-m'));
    }
}
