<?php

namespace App\OutputData;

class CsvOutputData implements OutputDataInterface
{
    public function convertData(array $data): ?string
    {
        $csvData = '';
        $header = false;

        foreach ($data as $currency => $value) {
            if (!$header) {
                $csvData .= 'Currency,Amount' . PHP_EOL;
                $header = true;
            }
            $csvData .= $currency . ',' . $value . PHP_EOL;
        }
        return $csvData;
    }
}
