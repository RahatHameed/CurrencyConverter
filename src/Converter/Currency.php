<?php

declare(strict_types=1);

namespace App\Converter;

use App\InputData\InputDataInterface;

class Currency
{
    private string $baseCurrency;
    private array $exchangeRates;
    private InputDataInterface $inputData;

    public function __construct(InputDataInterface $inputData)
    {
        $this->inputData = $inputData;
        $this->baseCurrency = $this->inputData->getData()['baseCurrency'];
        $this->exchangeRates = $this->inputData->getData()['exchangeRates'];
    }

    public function getBaseCurrency(): string
    {
        return $this->baseCurrency;
    }

    public function getExchangeRates(): array
    {
        return $this->exchangeRates;
    }

}
