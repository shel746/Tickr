#support/env.rb
#require 'capybara/rspec'
#require 'capybara/cucumber'

require 'rspec'
require 'selenium-webdriver'
#-----

#support/hooks.rb
#Capybara.app_host = ""                      #host directory for project files
#Capybara.default_driver = :selenium 		#to use selenium
#-----



#session = Capybara::Session.new :selenium 	# instantiate new 

driver = Selenium::WebDriver.for :firefox

#session object
#session.visit()                             # use it to call DSL methods

#----------------------------------------------------------------------------------

#driver = Selenium::Webdriver.for :firefox


Given(/^I am on the dashboard page4$/) do
	driver.navigate.to("http://localhost/tickr/dashboard.php")
end

#Logout

When (/^I try to logout$/) do
 # within("#session") do
	driver.find_element(:link_text, "Log Out").click
  #end
end

Then(/^I should see the login page$/) do 
	driver.navigate.to("http://localhost/index.html")
end
