<?php 
    session_start();
	if($_SESSION['loggedInUser'] != ''){
		echo $_SESSION["loggedInUser"];
	}
	else{
		echo "";
	}
?>