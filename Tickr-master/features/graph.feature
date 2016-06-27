Feature: Stock Graph
As a user, I want to see stock information on a graph, so that I may have idea of how well the company has done in the past.
	
	Scenario: User changes time period
		Given I am on the dashboard page3
		When I change time period
		Then I see the graph update accordingly to the selected option
	Scenario: User zooms
		Given I am on the dashboard page
		When I zoom
		Then I see the graph update to the next smallest option
	Scenario: user browses
		Given I am on the dashboard page
		When I look through the price histories
		Then I see the graph ‘move’ through further times
	Scenario: User adds stocks to graph
		Given I am on the dashboard page
		When I add a stock on the graph
		Then I see the stock’s line on the graph
		And I see the Legend update and symbolize the stock’s line
	Scenario: User removes stocks from graph
		Given I am on the dashboard page
		When I remove a stock from the graph
		Then I see the stock’s line disappear from the graph
		And I see the stock disappear from the legend.
