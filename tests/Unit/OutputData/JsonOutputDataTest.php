<?php

namespace Tests\Unit\OutputData;

use App\OutputData\JsonOutputData;
use PHPUnit\Framework\TestCase;

class JsonOutputDataTest extends TestCase
{
    public function testConvertData(): void
    {
        $inputData = [
            "EUR" => 1,
            "USD" => 1.0857,
            "CHF" => 0.98,
            "CNY" => 7.61
        ];

        $expectedResult = '{"EUR":1,"USD":1.0857,"CHF":0.98,"CNY":7.61}';
        $jsonOutputData = new JsonOutputData();
        $actualResult = $jsonOutputData->convertData($inputData);
        $this->assertEquals($expectedResult, $actualResult);
    }
}