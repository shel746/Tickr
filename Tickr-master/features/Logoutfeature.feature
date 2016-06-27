Feature: Testing for Logout
As a user, I want to logout, so that I may leave the application and come back at a later time.

Scenario: Successful Logout
	Given I want to use any browser
	And I am on the dashboard page4
	When I logout
	Then I am on the Login page
