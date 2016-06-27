<?php

function register($email, $password) {
	if ($email == '' || $password == '') {
		return false; 
	} else {
		$db = new mysqli("127.0.0.1", "root", "", "tickr_database");

        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
        $result = $db->query("SELECT * FROM users WHERE email = '$email'");
        
        if (mysqli_num_rows($result) == 0) {
            return true;
        } else {
            return false;
        }
	}
}

?>