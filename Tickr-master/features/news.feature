Feature: News widget
As a user, I want to see news articles of a company, so that I may judge whether investing in them is a good idea.

	Scenario: User selects a stock

		Given I am on the dashboard page5
		When I choose a stock from the watch list or portfolio
		Then I see the links related to the company in the news widget

	Scenario: User removes that stock

		Given I am on the dashboard page
		When I choose to remove a selected stock
		Then I see the stock’s links clear from the widget

	Scenario: User selects another stock

		Given I am on the dashboard page
		When I choose another stock from the watch list or portfolio
		Then I see the news links update for the new stock
