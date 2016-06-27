require 'rspec'
require 'selenium-webdriver'

driver = Selenium::WebDriver.for :firefox
#----------------------------------------------------------------------------------



Given(/^I am on the dashboard page6$/) do
	driver.navigate.to("http://localhost/tickr/dashboard.php")
end

#Download user Manual

When (/^I try to download the file$/) do
    driver.find_element(:link, 'manual/helpmanual.pdf').click
end

Then (/^ The file should be in my downloads folder $/)do |content|
  download_content.should == content
end
