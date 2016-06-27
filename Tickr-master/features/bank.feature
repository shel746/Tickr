Feature: Bank information
As a user, I want to see and edit my bank information, so that I may easily keep track of my balance.
	
Scenario: User changes information
Given I am on the dashboard page1
When I change my bank information
And submit the changes
Then I see the changes reflected in my account details
