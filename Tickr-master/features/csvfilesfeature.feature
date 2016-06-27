Feature: Uploading CSV files
As a user, I want to upload files to update my portfolio if I happened to have bought stocks somewhere else. I also want to download my portfolio information for my own use.

Scenario: Upload with missing information

Given I am on the dashboard page
When I choose to upload a file
And I specify my file
Then I see the error message “This file is missing parameters”
And I am on the dashboard page

Scenario: Upload with incorrect information
Given I am on the dashboard page
When I choose to upload a file
And I specify my file
Then I see the error message “This file has invalid parameters”
And I am on the dashboard page

Scenario: Upload with correct information
Given I am on the dashboard page
When I choose to upload a file
And I specify my file
Then I see the message “File Uploaded”
And I see my portfolio information update
And I am on the dashboard page
