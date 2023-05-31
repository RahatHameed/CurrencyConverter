<?php

namespace App\InputData;

use InvalidArgumentException;

class InputDataFactory
{
    public function create(string $inputFormat, string $inputFilename): InputDataInterface
    {
        return match ($inputFormat) {
            'json' => new JsonInputData($inputFilename),
            'csv' => new CsvInputData($inputFilename),
            'xml' => new XmlInputData($inputFilename),
            default => throw new InvalidArgumentException('Invalid input format: ' . $inputFormat),
        };
    }
}
