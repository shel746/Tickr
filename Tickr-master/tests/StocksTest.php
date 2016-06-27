<?php

require_once("/var/www/html/stocks.php"); 

class StocksTest extends PHPUnit_Framework_TestCase {

    // TEST
    // ensures buying a stock reduces bank balance correctly
	public function testBuyStocksValid() {
		$this->assertEquals(
			80, 
			buyStock(100, 20)
		); 
	} 
	
    // TEST
    // ensures we can't buy a stock if we don't have money
	public function testBuyStockInvalid() {
		$this->assertEquals(
			-1,
			buyStock(0, 10)
		);
	} 

    // TEST
    // ensures we can sell a stock and get the balance in our account
	public function testSellStockValid() {
		$this->assertEquals(
			100,
			sellStock(50, 50)
		);
	} 

    // TEST
    // ensure that the table populates with the stock information correctly
	public function populateStocksValid() {
		$this->assertEquals(
			true,
			populateStocks()
		);
	} 
}

?>