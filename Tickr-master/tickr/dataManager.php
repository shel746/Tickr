<?php

$currentBalance = 10000;
$currentStocks = array('AAPL', 'BAC', 'TWTR');

function printCurrentBalance() {
    global $currentBalance;
    
    echo "$" . number_format($currentBalance, 0, '.', ',');
}

function printGraphLegend() {
    global $currentStocks;
    
    $index = 0;
    foreach ($currentStocks as $stock) {
        $index++;
        echo "<tr>".
             "<td>.</td>".
             "<td>$stock</td>".
             "</tr>";
    }
}

?>