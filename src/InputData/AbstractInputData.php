<?php

declare(strict_types=1);

namespace App\InputData;

use RuntimeException;

abstract class AbstractInputData implements InputDataInterface
{
    private const DATA_PATH = __DIR__ . '/../../data/';
    protected const FILE_NAME = '';

    public function getData(): array
    {
        $rawData = $this->receiveRawData();
        return $this->convertToArray($rawData);
    }

    protected function receiveRawData(): string
    {
        $fileName = $this->getFileName();
        if (file_exists($fileName) === false) {
            throw new RuntimeException('File does not exist.');
        }

        $data = file_get_contents($fileName);

        if ($data === false) {
            throw new RuntimeException('Failed to read the file.');
        }

        return $data;
    }

    private function getFileName(): string
    {
        return self::DATA_PATH . $this::FILE_NAME;
    }

    abstract protected function convertToArray(string $rawData): array;
}
