Feature: Testing for Registration
As a user, I want to register with the website, so that I may log in and use the app.
		
Scenario: User fills in available credentials

	Given I want to use any browser
	And I am on the registration page
	When I fill in my credentials
	And submit the credentials
	Then I see the registration complete					
	And I am on the login page			

Scenario: User fills in taken credentials

	Given I want to use any browser
	And I am on the registration page
	When I enter taken credentials
	And submit the credentials
	Then I see the error message ‘unavailable username”
	And I am on the registration page
			 	
Scenario: User types incorrect email

	Given I want to use any browser
	And I am on the registration page
	When I mistype my email
	And submit the credentials
	Then I see the error message “Please enter a valid email address”
	And I am on the registration page
