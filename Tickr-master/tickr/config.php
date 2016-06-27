<?php
// Connect to the Database
function connect() {
	$host = 'localhost';
	$db_name = 'csv_import_export'; //DB on phpmyadmin that we want to connect to
	$db_user = 'root';
	$db_password = '';
    
    return new PDO(
                   'mysql:host='.$host.'; dbname='.$db_name, $db_user, $db_password,
                   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
?>