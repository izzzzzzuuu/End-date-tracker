<?php
$dbhost="localhost";  // hostname
$dbuser="root"; // mysql username
$dbpass="root"; // mysql password
$db="expired_date"; // database you want to use

$username = $_POST['username'];
$pass = $_POST['password'];
 
$conn=mysqli_connect( $dbhost, $dbuser, $dbpass, $db ) or die("Could not connect: " .mysqli_error($conn) );

$query = "SELECT password FROM login where username = '$username'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
echo $data;
echo "\n";
echo $pass;

	
	if($pass == $data['password'] && $pass != null){
		header("Location:itemList.php");
	}else{
		echo "\n try again";
		header("refresh:1; url= login.php");
	}


 
//you can also directly write values in mysqli_connect():
 
 //$conn=mysqli_connect("localhost", "root", "root", "test");
 
?>