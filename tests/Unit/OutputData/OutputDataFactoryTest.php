<?php

namespace Tests\Unit\OutputData;

use App\OutputData\CsvOutputData;
use App\OutputData\JsonOutputData;
use App\OutputData\OutputDataFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


class OutputDataFactoryTest extends TestCase
{
    public function testInstanceOfJsonInputData(): void
    {
        $factory = new OutputDataFactory();
        $outputData = $factory->create('json');

        $this->assertInstanceOf(JsonOutputData::class, $outputData);
    }

    public function testInstanceOfCsvInputData(): void
    {
        $factory = new OutputDataFactory();
        $outputData = $factory->create('csv');

        $this->assertInstanceOf(CsvOutputData::class, $outputData);
    }

    public function testCreateWithInvalidFormat(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $inputFormat = 'invalid';
        $factory = new OutputDataFactory();
        $factory->create($inputFormat);
    }
}
