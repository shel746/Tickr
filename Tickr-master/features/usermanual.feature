Feature: Downloading User manual
As a user, I want to download a user manual, so that I may learn to use the application.


Scenario: Download manual
	Given I am on the dashboard page6
	When I choose to download the user manual
	Then I see the message “User manual downloaded”
	And I see the file in the directory
