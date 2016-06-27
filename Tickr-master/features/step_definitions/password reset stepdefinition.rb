require 'rspec'
require 'selenium-webdriver'

driver = Selenium::WebDriver.for :firefox      # use it to call DSL methods

#----------------------------------------------------------------------------------



Given(/^I am on the password reset page$/) do
	driver.navigate.to("http://localhost/index3.html")
end

#reset fails

When (/^I try to reset my password$/) do
  driver.find_element(:id, 'inputPassword').sendkeys ' '
  driver.find_element(:name, 'submit').click 
end

Then(/^I should see the error message$/)do
    driver.find_element(:class, 'container').text.include?("Please reenter your email!")
end


When (/^I try to reset my password$/) do
  driver.find_element(:id, 'inputPassword').sendkeys 'tickr@usc.edu'
  driver.find_element(:name, 'submit').click
end

Then(/^I should see the message$/)do
    driver.find_element(:class, 'container').text.include?("Password reset, password sent to your email!")
end


#—————------------------------------


Given(/^I am on the manual password reset page$/) do
  driver.navigate.to("http://localhost/index4.html")
end

#reset fails

When (/^I try to reset my password$/) do
    driver.find_element(:id, 'oldpassword').sendkeys 'test1'
    driver.find_element(:id, 'newpassword').sendkeys 'test2'
    driver.find_element(:id, 'reenternew').sendkeys 'test3'
    driver.find_element(:name, 'submit').click
end

Then(/^I should see the error message$/)do
    driver.find_element(:class, 'container').text.include?("Please reeenter your passwords!")
end



#reset works

When (/^I try to reset my password$/) do
    driver.find_element(:id, 'oldpassword').sendkeys 'password'
    driver.find_element(:id, 'newpassword').sendkeys 'newpass'
    driver.find_element(:id, 'reenternew').sendkeys 'newpass'
    driver.find_element(:name, 'submit').click
end

Then(/^I should see the message$/)do
  driver.find_element(:class, 'container').text.include?("Password reset!")
end
