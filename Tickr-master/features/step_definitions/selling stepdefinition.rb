require 'rspec'
require 'selenium-webdriver'

driver = Selenium::WebDriver.for :firefox			# use it to call DSL methods

#----------------------------------------------------------------------------------

Given(/^I am on the dashboard page$/) do
	driver.navigate.to("http://localhost/tickr/dashboard.php")
end

When (/^I try to sell stock$/) do
    driver.find_element(:id, "bs_tickerSymbol").sendkeys 'AAPL'
    driver.find_element(:id, "bs_companyName").sendkeys 'Apple Inc.'
    driver.find_element(:id, "bs_quantity").sendkeys '10'
    driver.find_element(:class, 'btn btn-success').click
end

Then(/^I should see the message$/)do
    driver.find_element(:class, 'panel-body').text.include?("Transaction complete!")
end

#—————————————————

When (/^I try to sell stock$/) do
    driver.find_element(:id, "bs_tickerSymbol").sendkeys 'AAPL'
    driver.find_element(:id, "bs_companyName").sendkeys 'Apple Inc.'
    driver.find_element(:id, "bs_quantity").sendkeys '100000'
    driver.find_element(:class, 'btn btn-success').click
end

Then(/^I should see the error message$/) do
    driver.find_element(:class, 'panel-body').text.include?("Not enough money!")
end

#—————————————

When (/^I try to sell stock$/) do
    driver.find_element(:id, "bs_tickerSymbol").sendkeys ' '
    driver.find_element(:id, "bs_companyName").sendkeys ' '
    driver.find_element(:id, "bs_quantity").sendkeys ' '
    driver.find_element(:class, 'btn btn-success').click
end

Then(/^I should see the error message$/) do
    driver.find_element(:class, 'panel-body').text.include?("That stock doesn't exist!")
end
