<?php

namespace Tests\Integration;

use App\Converter\Currency;
use App\Converter\CurrencyConverter;
use App\InputData\InputDataFactory;
use App\OutputData\OutputDataFactory;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    public function testCurrencyConverterJsonOutput(): void
    {
        $expected = '{"EUR":"100.00","USD":"108.57","CHF":"98.00","CNY":"761.00"}';
        $inputDataObj = (new InputDataFactory())->create('json', 'currencies.json');
        $outputDataObj = (new OutputDataFactory())->create('json');
        $currencyObj = new Currency($inputDataObj);
        $converterObj = new CurrencyConverter($outputDataObj);

        $actual = $converterObj->convert(100, $currencyObj);

        $this->assertEquals($expected, $actual);
    }

    public function testCurrencyConverterFailure(): void
    {
        $expected = '{"EUR":1,"USD":1,"CHF":1,"CNY":1}';

        $inputDataObj = (new InputDataFactory())->create('json', 'currencies.json');
        $outputDataObj = (new OutputDataFactory())->create('json');
        $currencyObj = new Currency($inputDataObj);
        $converterObj = new CurrencyConverter($outputDataObj);

        $actual = $converterObj->convert(100, $currencyObj);

        $this->assertNotEquals($expected, $actual);
    }

    public function testCurrencyConverterCsvOutput(): void
    {
        $expected = 'Currency,Amount
EUR,100.00
USD,108.57
CHF,98.00
CNY,761.00
';
        $inputDataObj = (new InputDataFactory())->create('json', 'currencies.json');
        $outputDataObj = (new OutputDataFactory())->create('csv');
        $currencyObj = new Currency($inputDataObj);
        $converterObj = new CurrencyConverter($outputDataObj);

        $actual = $converterObj->convert(100, $currencyObj);

        $this->assertEquals($expected, $actual);
    }
}
