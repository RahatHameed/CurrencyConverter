<?php

declare(strict_types=1);

namespace App\InputData;

interface InputDataInterface
{
    /**
     * @return array{
     *     baseCurrency: string,
     *     exchangeRates: array<string, float>
     *     }
     */
    public function getData(): array;
}
