<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['loggedInUser'] = '';

$servername = "mysql.cs.mun.ca";
$dbusername = "cs3715w18_acb438";
$dbpassword = "%QVz@g$$";
$database = "cs3715w18_acb438";
//create connection

$conn = mysqli_connect($servername, $dbusername, $dbpassword);
mysqli_select_db($conn, $database);
    if(!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }
    else{
        //echo "Connection Succesfully";
        $usernameValidation = "SELECT username, password FROM user WHERE username=" . "'$username'" . "AND password='$password'";
        $userValidationResult = mysqli_query($conn, $usernameValidation);
        
        
        while ($row=mysqli_fetch_array($userValidationResult)) {
    
            if($username == $row["username"] && $password == $row["password"]){
                $_SESSION['loggedInUser'] = $username;
                echo '1';
               // redirect('https://www.cs.mun.ca/~acb438/project/index.html', false);
                
            }

        }
        if($_SESSION['loggedInUser'] == ''){
            echo '0';
        }
        

    }
    
function redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}


//phpinfo();
?>
