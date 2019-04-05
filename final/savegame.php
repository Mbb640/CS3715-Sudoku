<?php
session_start();
if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}
//$score = $_POST['score'];

$sudokuGame  = $_POST['saveString'];
//$sudokuGame = "testgame";
//create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
else{
    if($_SESSION['loggedInUser'] == ""){
    	echo'unable to save game';
    }
	else
	{
		saveGame($_SESSION['loggedInUser'], $sudokuGame, $conn);
    	
    }
}
    
function saveGame($user, $sudokuGame, $conn){
    $savegame = "INSERT INTO saved_game (player, sudoku_game)" . "VALUES ('$user', '$sudokuGame')";
    mysqli_query($conn, $savegame);
}
    
?>
