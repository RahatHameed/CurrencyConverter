<?php

namespace Tests\Unit\Converter;

use App\Converter\Currency;
use App\Converter\CurrencyConverter;
use App\Converter\CurrencyConverterInterface;
use App\OutputData\JsonOutputData;
use App\OutputData\OutputDataInterface;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{

    public function testConvertCurrency(): void
    {
        $baseCurrency = 'EUR';
        $expectedData = '{"EUR":100,"USD":108.57000000000001,"CHF":98,"CNY":761}';

        $currencyMock = $this->createMock(Currency::class);
        $currencyMock
            ->method("getBaseCurrency")
            ->willReturn($baseCurrency);

        $currencyMock
            ->method("getExchangeRates")
            ->willReturn(
                [
                    'EUR' => 1.0,
                    'USD' => 1.0857,
                    'CHF' => 0.98,
                    'CNY' => 7.61
                ]
            );

        $outputData = new JsonOutputData();
        $currencyConverter = new CurrencyConverter($outputData);
        $this->assertEquals($expectedData, $currencyConverter->convert(100,$currencyMock));
    }

}
