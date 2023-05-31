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
        $this->initialize();
    }

    private function initialize(): void
    {
        $data = $this->inputData->getData();
        if (!isset($data['baseCurrency']) || !isset($data['exchangeRates'])) {
            throw new \RuntimeException('Invalid data format for Currency');
        }
        $this->baseCurrency = $data['baseCurrency'];
        $this->exchangeRates = $data['exchangeRates'];
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
