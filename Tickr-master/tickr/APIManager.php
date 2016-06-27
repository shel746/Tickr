<?php

require 'YahooFinance/YahooFinance.php';

$stocks = array('TWTR', 'BAC', 'AAPL', 'GOOG', 'TSLA', 'YHOO');

$currentStock = 'AAPL';

function printWatchlist() {
    global $stocks;
    
    $yf = new YahooFinance;
    $quote = json_decode($yf->getQuotes($stocks));
    
    foreach ($quote->query->results->quote as $stock) {
        $symbol = $stock->symbol;
        $company = $stock->Name;
        
        echo "<tr>".
             "<td><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td>".
             "<td>$symbol ($company)</td>".
             "<td class='right-text-align'><label class='checkbox-inline'><input type='checkbox' value=''></label></td>".
             "</tr>";
    }
}

function printStockInformationList() {
    global $stocks;
    
    $yf = new YahooFinance;
    $quote = json_decode($yf->getQuotes($stocks));
    
    foreach ($quote->query->results->quote as $stock) {
        $symbol = $stock->symbol;
        $company = $stock->Name;
        $quantity = 20; // get from database
        $lastPrice = number_format((float)$stock->LastTradePriceOnly, 2, '.', '');
        
        echo "<tr>".
             "<td>$symbol</td>".
             "<td>$company</td>".
             "<td>$quantity</td>".
             "<td>$" . $lastPrice . "</td>".
             "<td class='right-text-align'><label class='checkbox-inline'><input type='checkbox' value=''></label></td>".
             "</tr>";
    }
}

function printCurrentStockInformation() {
    global $currentStock;
    
    if ($currentStock == '') {
        echo "<div class='panel-body'>No stock selected.</div>";
    } else {
        $yf = new YahooFinance;
        $quote = json_decode($yf->getQuotes(array('TSLA', 'AAPL')));
        
        foreach ($quote->query->results->quote as $stock) {
            $symbol = $stock->symbol;
            $company = $stock->Name;
            $quantity = 20; // get from database
            $lastPrice = number_format((float)$stock->LastTradePriceOnly, 2, '.', '');
            $percentChange = $stock->PercentChange;
            $openingPrice = number_format((float)$stock->Open, 2, '.', '');
                
            if (substr($stock->PercentChange, 0, 1) === '+') {
                $color = "green";
            } else if (substr($stock->PercentChange, 0, 1) === '-') {
                $color = "red";
            } else {
                $color = "black";
            }
            
            echo "<table class='table'>".
                 "<tr><th class='center-text-align' colspan='4'>$symbol ($company)</th></tr>".
                 "<tr>".
                 "<th>Quantity</th><td class='right-text-align'>$quantity</td>".
                 "<th>Current Price</th><td class='right-text-align'>$" . $lastPrice . "</td></tr>".
                 "</tr>".
                 "<tr>".
                 "<th>Percent Change</th><td class='right-text-align'><font color='$color'>" . $percentChange . "</font></td>".
                 "<th>Opening Price</th><td class='right-text-align'>$" . $openingPrice . "</td></tr>".
                 "</tr></table>";
            return;
        }
    }
}

function getHistoricalDataForStock($symbol, $days) {
    $yf = new YahooFinance;
    $historicalData = json_decode($yf->getHistoricalData($symbol, date('Y-m-d', strtotime('-' . $days . ' days')), date('Y-m-d',time())));

    foreach ($historicalData->query->results->quote as $stock) {
        $data[] = (float)number_format((float)$stock->Close, 2, '.', '');
    }
    
    return $data;
}

?>