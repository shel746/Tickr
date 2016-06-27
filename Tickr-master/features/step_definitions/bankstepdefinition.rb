require 'rspec'
require 'selenium-webdriver'
driver = Selenium::WebDriver.for :firefox

#----------------------------------------------------------------------------------


Given(/^I am on the dashboard page1$/) do
    driver.navigate.to("http://localhost/tickr/dashboard.php")
end

When (/^I try to edit my bank information$/) do
    driver.find_element(:id,"Bank_name", :with => "Chase")
end

Then(/^I should see my watch list update$/) do
    driver.find_element(:class,"container").text.include?("Bank information updated!")
    driver.find_element(:class,"bank_info").text.include?("Chase")
end


