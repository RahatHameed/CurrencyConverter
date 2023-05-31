<?php

namespace App\InputData;

class InputDataFactory
{
    public function create(string $inputFormat, string $inputFilename): InputDataInterface
    {
        return match ($inputFormat) {
            'json' => new JsonInputData($inputFilename),
            'csv' => new CsvInputData($inputFilename),
            'xml' => new XmlInputData($inputFilename),
        };
    }
}
