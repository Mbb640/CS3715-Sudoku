<?php
session_start();
if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}
//$score = $_POST['score'];
$scoresArray =  array();

//$sudokuGame = "testgame";
//create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
else{
		$getScores = "SELECT player, score FROM score";
		$scores = mysqli_query($conn, $getScores);
		
        while ($row=mysqli_fetch_array($scores)) {
			
            
			$scoresArray[$row["player"]] = $row["score"] + $scoresArray[$row["player"]];
               // echo $row["sudoku_game"]
					//$row["player"]
        }  
		echo json_encode($scoresArray);
		
}
    
    
?>
