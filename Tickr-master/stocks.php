<?php

$stocks = array('AAPL', 'RIC', 'TWTR', 'BAC', 'DIS');

echo '<tr><td>YO</td><td>HI</td><td>BAH</td><td>GAH</td></tr>';

function populateStocks() {
	foreach ($stocks as $stock) {
		echo "<tr>".
			 "<td>",$stock,"</td>".
			 "<td>$102.00</td>".
			 "<td>$92.00</td>".
			 "<td>Sell</td>".
			 "</tr>";
	}
}

function buyStock($balance, $price) {
	$amt = $balance - $price;
	if ($amt < 0) {
		return -1; 
	} else {
		return $balance - $price; 
	}
} 

function sellStock($balance, $price) {
	return $balance + $price; 
} 

?>