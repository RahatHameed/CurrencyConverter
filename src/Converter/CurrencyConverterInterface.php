<?php

declare(strict_types=1);

namespace App\Converter;

interface CurrencyConverterInterface
{
    public function convert(float $amount, Currency $currency): string;
}
