require 'rspec'
require 'selenium-webdriver'
driver = Selenium::WebDriver.for :firefox

#----------------------------------------------------------------------------------

Given(/^I am on the Registration page$/) do
	driver.navigate.to("https://localhost/index2.html")
end

#Registration fails ---- taken username

When (/^I try to register$/) do
    driver.find_element(:id,"Email").send_keys("usertest@gmail.com")
    driver.find_element(:id,"Password").send_keys("password")
    driver.find_element(:name,"submit").click
end

Then(/^I should see the registration error message$/) do
    driver.find_element(:class,"container").text.include?("That username is not available!")
end



#Registration fails ---- blank fields

When (/^I try to register$/) do
    driver.find_element(:id,"Email").send_keys("")
    driver.find_element(:id,"Password").send_keys("")
    driver.find_element(:id,"Register").click
end

Then(/^I should see the registration error message$/)do
     driver.find_element(:class,"container").text.include?("Please enter a username and password to register!")
end


#Email invalid

When (/^I try to register$/) do
    driver.find_element(:id,"Email").send_keys("uset@gmil.co")
    driver.find_element(:id,"Password").send_keys("password")
    driver.find_element(:id,"Register").click
end

Then(/^I should see the registration error message$/) do
     driver.find_element(:class,"container").text.include?("Please enter a valid email!")
end

#Registration successful

When (/^I try to register$/) do
    driver.find_element(:id,"Email").send_keys("usertest@gmail.com")
    driver.find_element(:id,"Password").send_keys("password")
    driver.find_element(:id,"Register").click
end

Then(/^I should see the registration message$/) do
     driver.find_element(:class,"container").text.include?("Registration successful!")
end
