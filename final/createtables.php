<?php
if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}

//create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
else{
	echo 'h';
	$userTableSQL = "CREATE TABLE user(id int(20) NOT NULL AUTO_INCREMENT, username varchar(20) NOT NULL, password varchar(20) NOT NULL, fname varchar(20) NOT NULL, lname varchar(20) NOT NULL, PRIMARY KEY (id))";
	$savedgameTableSQl = "CREATE TABLE saved_game(id int(20) NOT NULL AUTO_INCREMENT, player VARCHAR(20) NOT NULL REFERENCES user(username), sudoku_game VARCHAR(200), PRIMARY KEY (id))";	
	$scoreTableSQL = "CREATE TABLE score(id int(20) NOT NULL AUTO_INCREMENT, player VARCHAR(20) NOT NULL REFERENCES user(username), score int(20) NOT NULL, PRIMARY KEY (id))";
	mysqli_query($conn, $userTableSQL);
	mysqli_query($conn, $scoreTableSQL);
	mysqli_query($conn, $savedgameTableSQl);	
}
?>