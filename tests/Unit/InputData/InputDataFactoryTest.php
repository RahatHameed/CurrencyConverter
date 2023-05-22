<?php

namespace Tests\Unit\InputData;

use App\InputData\CsvInputData;
use App\InputData\InputDataFactory;
use App\InputData\JsonInputData;
use App\InputData\XmlInputData;
use PHPUnit\Framework\TestCase;

class InputDataFactoryTest extends TestCase
{
    public function testInstanceOfJsonInputData(): void
    {
        $factory = new InputDataFactory();
        $inputData = $factory->create('json');

        $this->assertInstanceOf(JsonInputData::class, $inputData);
    }

    public function testInstanceOfCsvInputData(): void
    {
        $factory = new InputDataFactory();
        $inputData = $factory->create('csv');

        $this->assertInstanceOf(CsvInputData::class, $inputData);
    }

    public function testInstanceOfXmlInputData(): void
    {
        $factory = new InputDataFactory();
        $inputData = $factory->create('xml');

        $this->assertInstanceOf(XmlInputData::class, $inputData);
    }
}
