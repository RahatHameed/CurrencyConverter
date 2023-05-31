<?php

declare(strict_types=1);

namespace App\Converter;

interface CurrencyConverterInterface
{
    /**
     * Convert an amount of money from one currency to another.
     *
     * @param float $amount amount to convert.
     * @param Currency $currency The currency object .
     * @return string The converted amount in the different currencies.
     */
    public function convert(float $amount, Currency $currency): string;
}
