require 'rspec'
require 'selenium-webdriver'
driver = Selenium::WebDriver.for :firefox

#----------------------------------------------------------------------------------

Given(/^I am on the dashboard page3$/)do
    driver.navigate.to("https://localhost/tickr/dashboard.php")
end

Given(/^I select a stock from lists$/)do
    #within portfolio or watch lists
            driver.find_element(:id, "AAPL").click
end

When(/^I select new time periods$/)do
    driver.find_element(:name,"1d").click ||
    driver.find_element(:name,"5d").click ||
    driver.find_element(:name,"1m").click ||
    driver.find_element(:name,"3m").click ||
    driver.find_element(:name,"6m").click ||
    driver.find_element(:name,"all").click
end

Then(/^The graph should update$/)do
#reload graph
    driver.find_element(:class,"graph").text.include?("AAPL")
end
#——————————————————————————————————————————————————

When(/^ I select another stock with partially filled graph$/)do
    #within portfolio or watch lists
        driver.find_element(:id, "MSFT").click
end

Then(/^The graph should update$/)do
    #reload graph
    #graph should have new content
    driver.find_element(:class,"graph").text.include?("MSFT")

end
#——————————————————————————————————————————————————

When(/^i select another stock with full graph$/)do
    #within portfolio or watch lists
    driver.find_element(:id,"BAC").click
end

Then(/^I should see the error message$/)do
	driver.find_element(:class,"container").text.include?("Graph is full, please remove one or more!")
end
