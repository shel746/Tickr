<?php
//function for correct sign in 
function signInCorrectly() { ?>
	<script type="text/javascript">
		window.location = "tickr/dashboard.php";
	</script>  
<?php 
}
//function for incorrect sign in
function incorrectEmail() {
	?>
	<script type="text/javascript">
		window.location = "index.html";
		alert("Incorrect email/password");
	</script>  
<?php
}

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//connecting to the database
	$db = new mysqli("127.0.0.1", "root", "", "tickr_database");
	//checking for errors 
	if($db->connect_errno > 0){
		//error_log("ERROR!! DATABASE ERROR");
    	die('Unable to connect to database [' . $db->connect_error . ']');
	}
	//DB query
	$result = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	//checking if any results 
	if (mysqli_num_rows($result) == 0) {
		//no results (incorrect login)
		incorrectEmail();
	} else {
		//yes results (correct login)...redirect them to the dashboard
		signInCorrectly();
	}
}

?>

