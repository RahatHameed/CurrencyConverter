<?php

namespace Tests\Unit\InputData;

use App\InputData\JsonInputData;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class JsonInputDataTest extends TestCase
{
    /**
     * @var JsonInputData
     */
    protected JsonInputData $jsonInputData;

    public function setUp(): void
    {
        $this->jsonInputData = $this->getMockBuilder(JsonInputData::class)
            ->onlyMethods(['receiveRawData'])
            ->getMock();

        parent::setUp();
    }

    public function testConvertToArraySuccess(): void
    {
        $this->jsonInputData->expects($this->once())
            ->method('receiveRawData')
            ->willReturn('{"baseCurrency": "EUR"}');

        $this->assertEquals(['baseCurrency' => 'EUR'], $this->jsonInputData->getData());
    }

    public function testConvertToArrayExpectException(): void
    {
        $this->expectException(RuntimeException::class);

        $this->jsonInputData->expects($this->once())
            ->method('receiveRawData')
            ->willReturn('invalid json here');

        $this->jsonInputData->getData();
    }
}
