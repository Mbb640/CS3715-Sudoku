<?php
session_start();
if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}
//$score = $_POST['score'];

$user = $_SESSION['loggedInUser'];
$user = 'jsmith';
$savedGame = 0;
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
		$getGame = "SELECT player, sudoku_game FROM saved_game WHERE player=" . "'$user'";
		$game = mysqli_query($conn, $getGame);
		
        while ($row=mysqli_fetch_array($game)) {
            if($user == $row["player"]){
				$savedGame = 1;
                echo $row["sudoku_game"];
				$deleteGame = "DELETE FROM saved_game WHERE player=" . "'$user'";
				mysqli_query($conn, $deleteGame);
                
            }

        }
		
		if($savedGame == 0){
			echo "0";
		}
		
    	
    }
}
    
    
?>
