<?php

require_once("/var/www/html/ajaxCalls.php");
require_once("/var/www/html/signin.php"); 

class SignInTest extends PHPUnit_Framework_TestCase
{
    // TEST
    // ensures the sign in information is valid
	public function testSignInValid() {
		$this->assertEquals(
			'success', 
			signIn('tickr@usc.edu', 'password')
		); 
	}

    // TEST
    // ensures we can't sign in with invalid information
	public function testSignInInvalid() {
		$this->assertEquals(
			'error', 
			signIn('julias@usc.edu', 'password')
		); 
	}
	
    // TEST
    // ensures we can't sign in if we dont' provide a valid email and password
	public function testSignInNoUsernameOrPassword() {
		$this->assertEquals(
			'error',
			signIn('', '')
		);
	}

    // TEST
    // ensures we can't sign in without a username
	public function testSignInNoUsername() {
		$this->assertEquals(
			'error',
			signIn('', 'password')
		);
	}

    // TEST
    // ensures we can't sign in without a password
	public function testSignInNoPassword() {
		$this->assertEquals(
			'error',
			signIn('tickr@usc.edu', '')
		);
	}
}

?>