<?php

namespace App\InputData;

class InputDataFactory
{
    public function create(string $inputFormat): InputDataInterface
    {
        return match ($inputFormat) {
            'json' => new JsonInputData(),
            'csv' => new CsvInputData(),
            'xml' => new XmlInputData(),
        };
    }
}
