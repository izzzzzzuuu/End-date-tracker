<?php

function getListOfStock()
{
	//1.connect to database
	//2. get  record from  
	//3. return  record
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}

	$sql='select * from product';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}	

function searchById($ID)
 {
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}

	$sql="select * from product where ID =".$ID."";
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
} 
	
function ASC(){
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql='SELECT * FROM product ORDER BY ID ASC ';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}

function DESC(){
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql='SELECT * FROM product ORDER BY ID DESC ';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}
	
	
?>
