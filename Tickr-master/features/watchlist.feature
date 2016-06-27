Feature: WatchList
As a user, I want to add stocks that I’m interested in to a list, so that I may have quicker access to them should I decide to buy any.

Scenario: User adds
Given I am on the dashboard page7
When I choose a stock from the search bar
Then I see the stock in my watch list

Scenario: User removes
Given I am on the dashboard page
When I choose to remove a stock from the list
Then I see the stock get deleted from the list
		

