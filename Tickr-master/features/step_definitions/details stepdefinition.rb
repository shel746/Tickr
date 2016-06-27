require 'rspec'
require 'selenium-webdriver'

driver = Selenium::WebDriver.for :firefox      # use it to call DSL methods
#----------------------------------------------------------------------------------



Given(/^I am on the dashboard page2$/) do
  driver.navigate.to("http://localhost/tickr/dashboard.php")
end

When (/^I choose a stock from lists$/) do
  options=driver.find_elements(:class, "panel-title")

    #### Select the option "Volvo"
  options.each do |g|
    if g.text == "APPL"
    g.find_element(:class, 'checkbox-inline').click
    break
    end
  end
end

Then(/^I should see stock details on the page$/) do
	page.should have_content('stockoption1 details')
  driver.find_element(:class, 'panel-title').text.include?("Apple Inc.")
end


When (/^I choose a new stock from lists$/) do
  options=driver.find_elements(:class, "panel-title")

    #### Select the option "Volvo"
  options.each do |g|
    if g.text == "GOOG"
    g.find_element(:class, 'checkbox-inline').click
    break
    end
  end
end

Then(/^I should see updated details$/) do
	page.should have_content('stockoption2 details')
  driver.find_element(:class, 'panel-title').text.include?("Google Inc.")
end

                             
When (/^I deselect a stock in lists$/) do
  options=driver.find_elements(:class, "panel-title")

    #### Select the option "Volvo"
  options.each do |g|
    if g.text == "APPL"
    g.find_element(:class, 'checkbox-inline').clear
    break
    end
  end
end

Then(/^I should see no details$/) do
    driver.find_element(:class, 'panel-title').text.exclude?("Apple Inc.")
end
