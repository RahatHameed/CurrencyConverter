<?php

namespace Tests\Integration;

use App\Converter\Currency;
use App\InputData\InputDataFactory;
use App\InputData\InputDataInterface;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class CurrencyTest extends TestCase
{
    public function testInitialize(): void
    {
        $inputDataObj = (new InputDataFactory())->create('json', 'currencies.json');
        $currency = new Currency($inputDataObj);
        $expected = [
            'EUR' => 1,
            'USD' => 1.0857,
            'CHF' => 0.98,
            'CNY' => 7.61,
        ];

        $this->assertEquals('EUR', $currency->getBaseCurrency());
        $this->assertEquals($expected, $currency->getExchangeRates());
    }

    public function testInitializeException(): void
    {
        $inputData = $this->createMock(InputDataInterface::class);
        $inputData->expects($this->once())
            ->method('getData')
            ->willReturn(['invalidData' => true]);

        $this->expectException(RuntimeException::class);
        new Currency($inputData);
    }
}
