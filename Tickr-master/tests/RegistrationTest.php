<?php

require_once("/var/www/html/register.php"); 

class RegistrationTest extends PHPUnit_Framework_TestCase {
	
    // TEST
    // ensures the registration information is correct
	public function testRegistrationValid() {
		$this->assertEquals(
			true,
			register('test@usc.edu', 'password')
		); 
	} 

    // TEST
    // ensures we can't register with an invalid email
	public function testRegistrationInvalidEmail() {
		$this->assertEquals(
			false,
			register('', 'password')
		); 
	} 

    // TEST
    // ensures we can't register with an invalid password
	public function testRegistrationInvalidPassword() {
		$this->assertEquals(
			false,
			register('test@usc.edu', '')
		); 
	} 
    
    // TEST
    // ensures we can't register with an invalid email and password
	public function testRegistrationInvalid() {
		$this->assertEquals(
			false,
			register('', '')
		); 
	} 

    // TEST
    // ensures we can't register with an email that's already been taken
	public function testEmailTaken() {
		$this->assertEquals(
			false,
			register('tickr@usc.edu', 'password')
		); 
	} 	
}

?>