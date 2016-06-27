require 'rspec'
require 'selenium-webdriver'
driver = Selenium::WebDriver.for :firefox

#----------------------------------------------------------------------------------


Given(/^I am on the Login page$/) do
    driver.navigate.to("https://localhost/index.html")
end

#Login fails - empty fields

When (/^I try to login$/) do
    driver.find_element(:id,"Email").send_keys("")
    driver.find_element(:id,"Password").send_keys("")
    driver.find_element(:id,"Login").click
end

Then(/^I should see the login error message$/)do
    driver.find_element(:class,"container").text.include?("Please enter username and password!")
end

#Login fails - mismatch/not registered

When (/^I try to login$/) do
    driver.find_element(:id,"Email").send_keys("badtest")
    driver.find_element(:id,"Password").send_keys("fail")
  
  driver.find_element(:id,"Login").click
end

Then(/^I should see the Login error message$/)do
    driver.find_element(:class,"container").text.include?("Invalid, No registered user with that username!")
end

#Login successful

When (/^I try to login$/) do
    driver.find_element(:id,"Email").send_keys("tickr@usc.edu")
    driver.find_element(:id,"Email").send_keys("password")
    driver.find_element(:id,"Login").click
end

Then(/^I should see the main dashboard page$/)do
    driver.navigate.to("https://localhost/tickr/dashboard.php")
end
