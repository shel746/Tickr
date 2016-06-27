require 'rspec'
require 'selenium-webdriver'

driver = Selenium::WebDriver.for :firefox      # use it to call DSL methods

#----------------------------------------------------------------------------------



Given(/^I am on the dashboard page5$/) do
	driver.navigate.to("http://localhost/tickr/dashboard.php")
end

When (/^I choose a stock from lists$/) do
    #### Extract all options from the select box
    options=driver.find_elements(:class, "panel-title")

    #### Select the option "Volvo"
    options.each do |g|
      if g.text == "Apple"
      g.find_element(:class, 'checkbox-inline').click
      break
      end
    end
end

Then(/^I should see news on the page$/) do
    driver.find_element(:id, 'news-widget').text.include?("Apple")
end
