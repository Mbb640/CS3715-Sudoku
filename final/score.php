<?php
session_start();
if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}
//$score = $_POST['score'];
//echo $_SESSION['loggedInUser'];
$score  = $_POST['score'];
//create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
else{
    if($_SESSION['loggedInUser'] == ""){
    	echo'unable to save score';
    }
	else
	{
		saveScore($_SESSION['loggedInUser'], $score, $conn);
    	
    }
}
    
function saveScore($user, $score, $conn){
    $savescore = "INSERT INTO score (player, score)" . "VALUES ('$user', '$score')";
    mysqli_query($conn, $savescore);
}
    
?>
