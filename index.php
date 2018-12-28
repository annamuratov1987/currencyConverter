<?php
require "vendor/autoload.php";
use CurrencyService\CurrencyService;

$currensyService = new CurrencyService();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <link rel="stylesheet" href="/css/style.css">

    <title>Converter</title>
</head>
<body>
<div class="container">
    <!--Begin header block-->
    <div class="header">
        <div class="header-logo">
            <img src="/img/logo.gif" alt="Логотип">
            <span>Converter</span>
        </div>
    </div>
    <!--End header block-->

    <!--Begin content block-->
    <div class="content">
        <form action="convertCurrency.php" id="currency-convert-form">
            <input type="text" name="amount" id="currency-convert-form-amount">
            <label for="#currency-convert-form-amount">USD</label>
            <br>
            <label>=</label>
            <br>
            <input type="text" name="total" id="currency-convert-form-result" readonly>
            <select name="toCurrency" id="currency-convert-form-toCurrency">
                <?php
                $currencies = $currensyService->getCurrencies();
                foreach ($currencies as $item=>$value)
                    echo "<option value='$item'>{$value}</option>"
                ?>
            </select>
            <button type="submit" id="currency-convert-form-submit" disabled>Convert</button>
        </form>
        <span class="result"></span>
    </div>
    <!--End content block-->
</div>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>