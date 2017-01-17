<?php

namespace CashManager\Account;

use CashManager\Data\DataStructureInterface;
use CashManager\Person\Person;
use CashManager\Transaction\Transactions;
use CashManager\Currency\Currency;
use Ramsey\Uuid\Uuid;

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
        $this->accountData = $dataStructure;
        $this->transactions = $transactions;
        $this->person = $person;
        $this->currency = $currency;
        $this->accountData->setValue('account_id', Uuid::uuid4()->getInteger());
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
