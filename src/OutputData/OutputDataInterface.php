<?php

declare(strict_types=1);

namespace App\OutputData;

interface OutputDataInterface
{
    public function convertData(array $data): ?string;
}
