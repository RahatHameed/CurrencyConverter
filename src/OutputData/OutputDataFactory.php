<?php

namespace App\OutputData;

use InvalidArgumentException;

class OutputDataFactory
{
    public function create($outputFormat): OutputDataInterface
    {
        return match ($outputFormat) {
            'json' => new JsonOutputData(),
            'csv' => new CsvOutputData(),
            default => throw new InvalidArgumentException('Invalid output format: ' . $outputFormat),
        };
    }
}
