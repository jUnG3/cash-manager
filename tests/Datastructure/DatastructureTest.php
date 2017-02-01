<?php

class DatastructureTest extends PHPUnit\Framework\TestCase
{
    /**
     * @covers DataStructure::create
     * @expectedException TypeError
     */
    public function testCreateMethodWithNothing()
    {
        \CashManager\Data\DataStructure::create(null);
    }

    /**
     * @covers DataStructure::create
     */
    public function testCreateMethod()
    {
        $this->assertInstanceOf('CashManager\Data\DataStructure', \CashManager\Data\DataStructure::create());
    }

    /**
     * @covers       DataStructure::getValue
     * @expectedException Exception
     * @dataProvider testDataException
     * @param array $data
     * @param string $key
     * @param mixed $result
     */
    public function testGetKeyException($data, $key, $result)
    {
        $d = \CashManager\Data\DataStructure::create($data);
        $d->getValue($key);
    }

    /**
     * @covers       DataStructure::create
     * @dataProvider testData
     * @param array $data
     * @param string $key
     * @param mixed $result
     */
    public function testGetKey($data, $key, $result)
    {
        $d = \CashManager\Data\DataStructure::create($data);
        $this->assertEquals($result, $d->getValue($key));
    }

    /**
     * @covers       DataStructure::testKey
     * @dataProvider testData
     * @param array $data
     * @param string $key
     * @param mixed $result
     */
    public function testKey($data, $key, $result)
    {
        $d = \CashManager\Data\DataStructure::create($data);
        $this->assertEquals(true, $d->testKey($key));
    }

    /**
     * @covers       DataStructure::setValue
     * @dataProvider testData
     * @depends      testGetKey
     * @param array $data
     * @param string $key
     * @param mixed $result
     */
    public function testSetData($data, $key, $result)
    {
        $d = \CashManager\Data\DataStructure::create();
        $d->setValue($key, array_shift($data));
        $this->assertEquals($result, $d->getValue($key));
    }

    /**
     * @return array
     */
    public function testDataException()
    {
        return [
            'Exception' => [['name' => 'ante'], 'id', 'ante']
        ];
    }

    /**
     * @return array
     */
    public function testData()
    {
        return [
            'Name' => [['name' => 'ante'], 'name', 'ante'],
            'Id' => [['id' => 'Hallo Welt'], 'id', 'Hallo Welt'],
            'Number' => [['id' => 22], 'id', 22],
        ];
    }
}
