<?php

namespace CashManager\Transaction;

use CashManager\Account\Account;
use SeekableIterator;
use OutOfBoundsException;

class Transactions implements SeekableIterator
{
    /**
     * @var Transaction[]
     */
    private $transactions;
    /**
     * @var int
     */
    private $position;
    /**
     * @var Account
     */
    private $account;

    /**
     * Transactions constructor.
     * @param Account $account
     */
    public function __construct(Account $account)
    {
        $this->transactions = [];
        $this->position = 0;
        $this->account = $account;
    }

    /**
     * @param Transaction $transaction
     */
    public function add(Transaction $transaction)
    {
        $this->transactions[$this->position] = $transaction;
    }

    /**
     * @return Transaction
     */
    public function current() : Transaction
    {
        return $this->transactions[$this->position];
    }

    /**
     * Go to the next key
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Returns the current position
     * @return int
     */
    public function key() : int
    {
        return $this->position;
    }

    /**
     * Test if current transaction is an valid value
     * @return bool
     */
    public function valid() : bool
    {
        return isset($this->transactions[$this->position]) ?
            $this->transactions[$this->position] instanceof Transaction : false;
    }

    /**
     * Resets the position to 0
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Jump to position
     * @param int $position
     */
    public function seek($position)
    {
        if (!isset($this->transactions[$position])) {
            throw new OutOfBoundsException("invalid seek position ($position)");
        }

        $this->position = $position;
    }

    /**
     * @return Account
     */
    public function getAccount() : Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }
}
