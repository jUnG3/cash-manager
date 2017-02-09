<?php

namespace CashManager\Account;

use CashManager\Data\DataStructureInterface;
use CashManager\Person\Person;
use CashManager\Transaction\Transactions;
use CashManager\Currency\Currency;

class Account
{
    /**
     * @var DataStructureInterface
     */
    private $accountData;
    /**
     * @var Transactions
     */
    private $transactions;
    /**
     * @var Person
     */
    private $person;
    /**
     * @var Currency
     */
    private $currency;

    /**
     * Account constructor.
     * @param DataStructureInterface $dataStructure
     * @param Transactions $transactions
     * @param Person $person
     * @param Currency $currency
     */
    public function __construct(
        DataStructureInterface $dataStructure,
        Transactions $transactions,
        Person $person,
        Currency $currency
    ) {
        if ($dataStructure->testKey('account_id')) {
            throw new \InvalidArgumentException('Account id is not set');
        }
        $this->accountData = $dataStructure;
        $this->transactions = $transactions;
        $this->person = $person;
        $this->currency = $currency;
    }

    /**
     * @return Transactions
     */
    public function transactions() : Transactions
    {
        return $this->transactions;
    }

    /**
     * @return Person
     */
    public function person() : Person
    {
        return $this->person;
    }

    /**
     * @return Currency
     */
    public function currency() : Currency
    {
        return $this->currency;
    }
}
