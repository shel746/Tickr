Feature: Buying Stock
As a user, I want to buy stock that I am interested in, so that I may make profits.

Scenario : Successful transaction 
	Given I am on the dashboard page
	When I enter stock information
	And choose to buy
	Then I am on the dashboard page
	And I see my balance decrease
	And the stock appears in my portfolio list

Scenario : Not enough money
	Given I am on the dashboard page
	When I enter stock information
	And choose to buy
	Then I see the error message “Insufficient funds”
	And I am on the dashboard page

Scenario : Market is closed
	Given I am on the dashboard page
	When I enter stock information
	And choose to buy
	Then I see the error message “Markets closed between 4pm-8am”
	And I am on the dashboard page


Scenario : Nonexistent stock
	Given I am on the dashboard page
	When I enter stock information
	And choose to buy
	Then I see the error message “Invalid stock”
	And I am on the dashboard page
