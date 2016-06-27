Feature: Stock Details
As a user, I want to see detailed information of a stock, so that I know how it is faring day-to-day, as well as seeing company information.

Scenario: User selects a stock
Given I am on the dashboard page2
When I choose a stock from the watch list or portfolio
Then I see the stock’s information in the details widget

Scenario: User removes that stock
Given I am on the dashboard page
When I choose to remove a selected stock
Then I see the stock’s detail get cleared from the widget

Scenario: User selects another stock
Given I am on the dashboard page
When I choose another stock from the watch list or portfolio
Then I see the stock details update for the new stock
