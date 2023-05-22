<?php

namespace Tests\Unit\OutputData;

use App\OutputData\CsvOutputData;
use PHPUnit\Framework\TestCase;

class CsvOutputDataTest extends TestCase
{
    public function testConvertData(): void
    {
        $inputData = [
            "EUR" => 1,
            "USD" => 1.0857,
            "CHF" => 0.98,
            "CNY" => 7.61
        ];

        $expectedResult = 'Currency,Amount
EUR,1
USD,1.0857
CHF,0.98
CNY,7.61
';
        $csvOutputData = $this->createMock(CsvOutputData::class);

        $csvOutputData->expects($this->once())
            ->method('convertData')
            ->willReturn($expectedResult);
        $actualResult = $csvOutputData->convertData($inputData);
        $this->assertEquals($expectedResult, $actualResult);
    }
}