<?php

namespace App\OutputData;

class OutputDataFactory
{
    public function create($outputFormat): OutputDataInterface
    {
        return match ($outputFormat) {
            'json' => new JsonOutputData(),
            'csv' => new CsvOutputData(),
        };
    }
}
