<?php

namespace CashManager\Transaction;

use \SeekableIterator;
use \OutOfBoundsException;

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
     * Transactions constructor.
     */
    public function __construct()
    {
        $this->transactions = [];
        $this->position = 0;
    }

    /**
     * @param Transaction $transaction
     */
    public function add(Transaction $transaction)
    {
        $this->transactions[] = $transaction;
    }

    /**
     * @return Transaction
     */
    public function current()
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
    public function key()
    {
        return $this->position;
    }

    /**
     * Test if current transaction is an valid value
     * @return bool
     */
    public function valid()
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
}
