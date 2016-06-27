Feature: Password Reset outside the app
As a user, I want to reset my password so that I may continue using the app, or simply change it at my own preference.

Scenario: Getting to the PR page
	
	Given I want to use any browser
	And I am on the login page
	When I choose forgot password
	Then I am on the password reset page
	

Scenario: Forgot password Success

	Given I want to use any browser
	And I am on the password reset page
	When I enter my email
	Then I see the message “New password has been emailed to you”
	And I see the message in my email
	And I am on the login page


Scenario: Forgot password Fail

	Given I want to use any browser
	And I am on the password reset page
	When I enter my email
	Then I see the error message “Please reenter your email”
	And I am on the password reset page


Scenario: Getting to the MPR page

	Given I want to use any browser
	And I am on the dashboard page
	When I choose password reset
	Then I am on the manual reset page

Scenario: manual reset fail

	Given I am on the manual reset page
	When I enter my current and new passwords
	And submit the credentials
	Then I see the error message “Please reenter passwords”
	And I am on the manual reset page

Scenario: manual reset good

	Given I am on the manual reset page
	When I enter my current and new passwords
	And submit the credentials
	Then I see the message “Password reset”
	And I am on the dashboard page
