<?php

declare(strict_types=1);

namespace App\InputData;

use RuntimeException;

class JsonInputData extends AbstractInputData
{
    protected const FILE_NAME = 'currencies.json';
    protected function convertToArray(string $rawData): array
    {
        $data = null;
        if (!empty($rawData)) {
            $data = json_decode($rawData, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new RuntimeException('Not valid json data.');
            }
        }
        return $data;
    }
}
