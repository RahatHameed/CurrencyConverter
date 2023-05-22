<?php

declare(strict_types=1);

namespace App\InputData;

class XmlInputData extends AbstractInputData
{
    protected const FILE_NAME = 'currencies.xml';
    protected function convertToArray(string $rawData): array
    {
        /**
         * @todo Implement conversion
         */

        return [];
    }
}
