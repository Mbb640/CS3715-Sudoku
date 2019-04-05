<?php
//include($_SERVER['DOCUMENT_ROOT']."database.php");
if(file_exists("database.php")) {
    include_once("database.php");
    
} else {
    echo"file is not found";
}

$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$takenUsername = 0;


//create connection

$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);

    if(!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }
    else{
        //echo "Connection Succesfully";
        $usernameValidation = "SELECT username FROM user WHERE username=" . "'$username'";
        $userValidationResult = mysqli_query($conn, $usernameValidation);
        
        
        while ($row=mysqli_fetch_array($userValidationResult)) {
            
            if($username == $row["username"]){
                echo '1';
                $takenUsername = 1;
            }

        }
        
        if(!$takenUsername){
            createuser($username, $password, $fname, $lname, $conn);
            echo '0';
            
        }
        

    }

function createuser($username, $password, $firstname, $lastname, $conn){
    $createusersql = "INSERT INTO user (username, password, fname, lname)" . "VALUES ('$username', '$password', '$firstname', '$lastname')";
    mysqli_query($conn, $createusersql);
}

/*
function createUser($username, $password, $firstname, $lastname, $conn){
    $createUserSQLInsert =  $conn->prepare("INSERT INTO user (username, password, fname, lname) VALUES (?, ?, ?, ?)");
    $createUserSQLInsert->bindParam(1, $accountUsername);
    $createUserSQLInsert->bindParam(2, $accountPassword);
    $createUserSQLInsert->bindParam(3, $accountFname);
    $createUserSQLInsert->bindParam(4, $accountLname);

    $accountUsername = $username;
    $accountPassword = $password;
    $accountFname = $firstname;
    $accountLname = $lastname;
    $createUserSQLInsert->execute();

}
*/
//phpinfo();
?>
