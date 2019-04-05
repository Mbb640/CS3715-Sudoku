<?php

if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}
$score = 500;
//create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);
    if($_SESSION['loggedInUser'] != ''){
        echo 'before';
    saveScore($_SESSION['loggedInUser'], $score, $conn);
    }
function saveScore($user, $score $conn){
    $savescore = "INSERT INTO score (player, score)" . "VALUES ('$user', '$score')";
    mysqli_query($conn, $savescore);
}
    
?>
