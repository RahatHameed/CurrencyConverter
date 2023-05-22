<?php

namespace App\OutputData;

class JsonOutputData implements OutputDataInterface
{
    public function convertData(array $data): ?string
    {
        return json_encode($data);
    }
}
