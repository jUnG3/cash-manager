<?php
namespace tests\Currency;

use PHPUnit\Framework\TestCase;
use CashManager\Currency\Currency;
use CashManager\Data\DataStructure;

class CurrencyTest extends TestCase
{
    /**
     * @covers Currency::__construct
     * @expectedException \TypeError
     */
    public function testCurrencyConstructor()
    {
        $c = new Currency(null);
    }

    /**
     * @covers Currency::_construct
     */
    public function testCanBeCreatedWithNoData()
    {
        $c = new Currency(DataStructure::create());
        $this->assertInstanceOf('CashManager\\Currency\\Currency', $c);
    }

    /**
     * @covers       DataStructure::name
     * @dataProvider currencyDataProvider
     */
    public function testName($a, $excpected)
    {
        $currency = new Currency(DataStructure::create($a));
        $this->assertEquals($excpected, $currency->name());
    }

    /**
     * @return array
     */
    public function currencyDataProvider()
    {
        return [
            'Euro currency' => [['currency_name' => 'Euro'], 'Euro'],
            'US dollar currency' => [['currency_name' => 'Us dollar'], 'Us dollar'],
            'Croatian kuna currency' => [['currency_name' => 'Hrvatska kuna'], 'Hrvatska kuna'],
            'Bosanska marka currency' => [['currency_name' => 'Bosanska marka'], 'Bosanska marka'],
            'Makedonski denar' => [['currency_name' => 'Makedonski denar'], 'Makedonski denar'],
        ];
    }
}
