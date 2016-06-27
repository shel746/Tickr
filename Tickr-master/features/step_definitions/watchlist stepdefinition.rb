require 'rspec'
require 'selenium-webdriver'

driver = Selenium::WebDriver.for :firefox

#----------------------------------------------------------------------------------



Given(/^I am on the dashboard page7$/) do
	driver.navigate.to("http://localhost/tickr/dashboard.php")
end

When (/^I choose a stock from the search bar$/) do
	element = driver.find_element(:class, 'sr-only')
    element.send_keys 'App'
    all_options = element.find_elements(:tag_name, "searches")
    all_options.each do |option|
	 option.click if option.text == 'Apple'
	end
end

Then(/^I should see my watch list update$/) do    
	element = driver.find_element(:class, 'table table-hover')
    driver.find_element(:name, 'Apple')
end
