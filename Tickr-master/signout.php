//file to handle logout when user clicks the logout button

<?php

if (!isset($_SESSION)) {
    session_start();
}
    
    if(!isset($_SESSION['user']))
    {
        header("Location: index.php");
    }
    else if(isset($_SESSION['user'])!="")
    {
        header("Location: home.php");
    }
    
    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['user']);
        header("Location: index.php");
    }

    function signOut($username) {
		if(isset($username) && strlen($username) > 0) {
            unset($username);
            return true;
        } else {
       	    return false; 
		}
    }
?>