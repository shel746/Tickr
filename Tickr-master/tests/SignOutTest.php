<?php

require_once("/var/www/html/signout.php");

class SignOutTest extends PHPUnit_Framework_TestCase
{
    // TEST
    // ensures that sign out for the signed in user works
	public function testSignOutValid() {
		$this->assertEquals(
			true, 
			signOut('tickr@usc.edu')
		); 
	}

    // TEST
    // ensures that sign out for random users doesn't work
	public function testSignOutInvalid() {
		$this->assertEquals(
			false, 
			signOut('')
		); 
	}
}

?>