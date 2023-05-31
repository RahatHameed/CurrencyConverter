<?php
declare(strict_types=1);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
$config = require 'config/config.php';

$inputDataObj = (new \App\InputData\InputDataFactory())->create('test', $config['input_filename']);
$outputDataObj = (new \App\OutputData\OutputDataFactory())->create($config['output_format']);
$currencyObj = (new \App\Converter\Currency($inputDataObj));

$converterObj = (new \App\Converter\CurrencyConverter($outputDataObj));
$output = $converterObj->convert(100, $currencyObj);


echo $output;




