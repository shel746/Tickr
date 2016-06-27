<?php 
// including the config file
include('config.php');
$pdo = connect();

$csv_file =  $_FILES['csv_file']['tmp_name'];
if (is_file($csv_file)) {
	$input = fopen($csv_file, 'a+');
    
	// if the csv file contain the table header leave this line
	$row = fgetcsv($input, 1024, ',');
    
	while ($row = fgetcsv($input, 1024, ','))
    {
		// insert into the database
		$sql = 'INSERT INTO portfolio(stock_name, date, price, amount) 
                              VALUES(:stock_name, :date, :price, :amount)';
        
		$query = $pdo->prepare($sql);
		$query->bindParam(':stock_name', $row[1], PDO::PARAM_STR);
		$query->bindParam(':date', $row[2], PDO::PARAM_STR);
		$query->bindParam(':price', $row[3], PDO::PARAM_STR);
		$query->bindParam(':amount', $row[4], PDO::PARAM_INT);
		$query->execute();
	}
}

// redirect to the index page
header('location: dashboard.php');
?>


