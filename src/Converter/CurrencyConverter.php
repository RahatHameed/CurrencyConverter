<?php

declare(strict_types=1);

namespace App\Converter;

use App\OutputData\OutputDataInterface;
use Exception;
use RuntimeException;

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
        try {
            $convertedCurrencies = [];
            foreach ($currency->getExchangeRates() as $thisCurrency => $rate) {
                $convertedAmount = $amount;
                if ($currency->getBaseCurrency() !== $thisCurrency) {
                    $convertedAmount = $amount * $rate;
                }
                $convertedCurrencies[$thisCurrency] = $convertedAmount;
            }
            return $this->outputData->convertData($convertedCurrencies);
        } catch (Exception $e) {
            throw new RuntimeException('There is a error converting the currencies: ' . $e->getMessage());
        }
    }

}
