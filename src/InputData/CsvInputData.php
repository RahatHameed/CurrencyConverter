<?php

declare(strict_types=1);

namespace App\InputData;

class CsvInputData extends AbstractInputData
{
    protected const FILE_NAME = 'currencies.csv';
    protected function convertToArray(string $rawData): array
    {
        /**
         * @todo Implement conversion
         */

        return [];
    }
}
