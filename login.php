<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
<style>
	body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

    p1 
	{
		
		color:black;
		font-size : 38px;
		margin : 461px;
		text-align: center;
	
	}

	
	input[type=submit] {
      background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
	input[type=submit]:hover {
    background-color: #98F9A7;
	    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}


.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}
.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
}
.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

</style>
</head>
<body>


<?php

echo '<p1>End Date Tracker Software </p1><br><br><br><br><br><br<br><br><br><br><br>';
echo '<form action="config.php" method="post" style="max-width:500px;margin:auto">';

echo '<div class="input-container">';
echo '<i class="fa fa-user icon">';
echo '</i>';
echo '<input class="input-field" type="text" placeholder="Username" name="username"><p>';
echo '</div>';

echo '<div class="input-container">';
echo ' <i class="fa fa-key icon">';
echo '</i>';
echo '<input class="input-field" type="password" placeholder="Password" name="password"><p>';
echo '</div>';
echo '<input type="submit" name="submit" value="Login" >';
echo '</form>';

?>