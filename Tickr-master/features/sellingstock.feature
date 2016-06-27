Feature: Selling Stock
As a user, I want to sell shares that I own, so that I may make profits or save money on a losing stock.

Scenario : Successful transaction (some stock shares)
	Given I am on the dashboard page
	When I enter stock information
	And choose to sell some shares
	Then I am on the dashboard page
	And I see my balance increase
	And the stock quantity in portfolio list decreases

Scenario : successful transaction (all stock shares)
	Given I am on the dashboard page
	When I enter stock information
	And choose to sell all shares
	Then I am on the dashboard page
	And I see my balance increase
	And the stock is removed from my portfolio list

Scenario : successful transaction (more than what I own)
	Given I am on the dashboard page
	When I enter stock information
	And choose to sell all shares
	Then I see the error message “ You don’t own that many”
	And I am on the dashboard page

Scenario : Market is closed
	Given I am on the dashboard page
	When I enter stock information
	And choose to sell
	Then I see the error message “Markets closed between 4pm-8am”
	And I am on the dashboard page

Scenario : Nonexistent stock
	Given I am on the dashboard page
	When I enter stock information
	And choose to sell
	Then I see the error message “Invalid stock”
	And I am on the dashboard page
