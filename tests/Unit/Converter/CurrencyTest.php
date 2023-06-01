<?php

namespace Tests\Unit\Converter;

use App\Converter\Currency;
use App\InputData\InputDataInterface;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class CurrencyTest extends TestCase
{
    public function testCurrencyClass(): void
    {
        $expected = [
            "baseCurrency" => "EUR",
            "exchangeRates" => [
                "EUR" => 1,
                "USD" => 1.0857,
                "CHF" => 0.98,
                "CNY" => 7.61
            ]
        ];

        $inputDataInterface = $this->createMock(InputDataInterface::class);
        $inputDataInterface
            ->method('getData')
            ->willReturn($expected);

        $currency = new Currency($inputDataInterface);
        $this->assertEquals($expected['exchangeRates'], $currency->getExchangeRates());
        $this->assertEquals($expected['baseCurrency'], $currency->getBaseCurrency());
    }

    public function testCurrencyClassException(): void
    {
        $this->expectException(RuntimeException::class);
        $expected = [
            "invalidExchangeRates" => [
                "EUR" => 1,
                "USD" => 1.0857,
                "CHF" => 0.98,
                "CNY" => 7.61
            ]
        ];

        $inputDataInterface = $this->createMock(InputDataInterface::class);
        $inputDataInterface
            ->method('getData')
            ->willReturn($expected);
        new Currency($inputDataInterface);
    }

}
