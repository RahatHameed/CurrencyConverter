<?php

declare(strict_types=1);

namespace App\Converter;

use App\OutputData\OutputDataInterface;

class CurrencyConverter implements CurrencyConverterInterface
{
    private OutputDataInterface $outputData;

    public function __construct(
        OutputDataInterface $outputData
    ) {
        $this->outputData = $outputData;
    }

    public function convert(float $amount, Currency $currency): string
    {
        $convertedCurrencies = [];
        foreach ($currency->getExchangeRates() as $thisCurrency => $rate) {
            $convertedAmount = $amount;
            if($currency->getBaseCurrency() !== $thisCurrency) {
                $convertedAmount = $amount * $rate;
            }
            $convertedCurrencies[$thisCurrency] = number_format($convertedAmount, 2);
        }
        return $this->outputData->convertData($convertedCurrencies);
    }

}
