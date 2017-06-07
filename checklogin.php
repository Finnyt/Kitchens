<?php
session_start();
$host="localhost"; // Host name 
$username="gangaj49_koh"; // Mysql username 
$password="ginger+77"; // Mysql password 
$db_name="gangaj49_koh"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select database.
$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) die($conn->connect_error);

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn, $myusername);
$mypassword = mysqli_real_escape_string($conn, $mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "loginsuccess.php"
$_SESSION['myusername']= "myusername"; 
$_SESSION['mypassword']= "mypassword"; 
header("location:index.php");
}
else {
echo "Wrong Username or Password";
}
?>