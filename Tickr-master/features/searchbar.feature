Feature: Search Bar for Stocks
As a user, I want to be able to use a search function to look through available stocks, so that I may easily find stocks that I may know of, instead of looking through a list of every stock

Scenario: User types name of an existing Stock
	Given I am on the dashboard page
	When I type in a stock name
	Then I see the stock appear
	
	
Scenario: User mistypes information
	Given I am on the dashboard page
	When I type in a stock name
	Then I see suggestions for stocks