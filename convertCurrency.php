<?php
require "vendor/autoload.php";
use CurrencyService\CurrencyService;


$currensyService = new CurrencyService();
if(isset($_REQUEST['amount']) && isset($_REQUEST['fromCurrency']) && isset($_REQUEST['toCurrency'])){
    $amount = $_REQUEST['amount'];
    if (preg_match('/[^0-9.]/', $amount)==1){
        echo "error";
        return;
    }
    $fromCurrency = $_REQUEST['fromCurrency'];
    $toCurrency = $_REQUEST['toCurrency'];
    $convertValue = $currensyService->convertCurrencyValue($fromCurrency, $toCurrency);

    if (is_nan(floatval($amount))){
        $result = "error";
        echo $result;
    }else{
        $result = $amount * $convertValue;
        echo number_format($result, 2, '.', '');
    }
}


?>