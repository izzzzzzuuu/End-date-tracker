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

	$sql='select * from stock';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}	

function searchById($id)
 {
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}

	$sql="select * from stock where id =".$id."";
	echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
} 
	
	
	
?>