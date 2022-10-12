<?php

function getListOfItem()
{
	//1.connect to database
	//2. get product record from expired_date table
	//3. return product record
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql='select * FROM product ';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}

function getItemInformation($product_barcode)
{
//create connection
$con=mysqli_connect("localhost","root","root","expired_date");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql = "select * from product where product_barcode = '".$product_barcode."'";

$qry = mysqli_query($con,$sql);//run query
return $qry;  //return query
}

function addProductRecord()
{
	
$product_barcode= $_POST['product_barcode'];
$items= $_POST['items'];
$brand= $_POST['brand'];
$category= $_POST['category'];
$lane= $_POST['lane'];
$mode= $_POST['mode'];
$shelf= $_POST['shelf'];
$expiredDate= $_POST['expiredDate'];
$stock= $_POST['stock'];
$con = mysqli_connect('localhost','root','root','expired_date');
if(!$con)
	{
	echo "Failed to connect:".mysqli_connect_error();
	}
else
	{
	echo 'connected';
	$sql = "insert into product(product_barcode,items,brand,category,lane,mode,shelf,expiredDate,stock)
	values('$product_barcode','$items','$brand','$category','$lane','$mode','$shelf','$expiredDate','$stock')";
	//$sql = "INSERT INTO product(product_barcode, items, brand, category, ) VALUES('value1',value2,value3); INSERT INTO STOCK(field) VALUES ('value1');";

	echo $sql;
	$qry = mysqli_query($con,$sql);
	if($qry)
		{
		echo 'record added';
		}
	}
}	

function deleteThisItem($product_barcode)
{
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql="delete from product where product_barcode ='".$product_barcode."'";
	
	echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}

function searchByBarcode($product_barcode)
{
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql="select * from product where product_barcode ='".$product_barcode."'";
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}

function searchByItems($items)
{
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql="select * from product where items like '%".$items."%'";
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}

function searchByCategory($category)
{
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql="select * from product where category ='".$category."'";
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}

function searchByBrand($brand)
{
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql="select * from product where brand ='".$brand."'";
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}

function searchByDate($expiredDate)				//search function by expiredDate
{
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql="select * from product where expiredDate ='".$expiredDate."'";
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}

function updateItemInformation()
{
//create connection
$con=mysqli_connect("localhost","root","root","expired_date");
if(!$con)
	{	echo  mysqli_connect_error(); 
	exit;	}
//get the data to update
 $oldproduct_barcode = $_POST['product_barcode'];
 $newproduct_barcode = $_POST['newproduct_barcode'];
 $items = $_POST['items']; //items
 $brand = $_POST['brand'];
 $category= $_POST['category'];
$lane= $_POST['lane'];
$mode= $_POST['mode'];
$shelf= $_POST['shelf'];
 $expiredDate = $_POST['expiredDate'];
 $stock = $_POST['stock'];
 $sql = 'UPDATE product SET product_barcode ="'.$newproduct_barcode.'", items = "'.$items.'", brand = "'.$brand.'", category = "'.$category.'",lane = "'.$lane.'", mode = "'.$mode.'", shelf = "'.$shelf.'", expiredDate = "'.$expiredDate.'", stock = "'.$stock.
'" WHERE product_barcode = "'.$oldproduct_barcode.'"';
//echo $sql;
$qry = mysqli_query($con,$sql);//run query
return $qry;  //return query
}

/* function searchBox()
{
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql='select * FROM product';
	//echo $sql;
	$qry=mysqli_query($con,$sql);
	return $qry;
}
//-----------------------------------------------------------------------
	if (isSet($_POST['searchByBarcode']))						//query for searching by barcode
		$itemQry = searchByBarcode($_POST['searchValue']);
	
	else if(isSet($_POST['searchByItems']))						//query for searching by Item
		$itemQry = searchByItems($_POST['searchValue']);
	
	else if(isSet($_POST['searchByBrand']))						//query for searching by brand
		$itemQry = searchByBrand($_POST['searchValue']);
	
	else if(isSet($_POST['searchByDate']))						//query for searching by Date
		$itemQry = searchByDate($_POST['searchValue2']);
	
	else
		$itemQry=getListOfItem();								//query for searching by Display all function
//---------------------------------------------------------------------
} */
 
 function ASC()
{
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql='SELECT * FROM product ORDER BY expiredDate ASC ';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}

function DESC()
{
	
	$con=mysqli_connect("localhost","root","root","expired_date");
	if(!$con)
	{
		echo mysqli_connect_error();
		exit;
	}
	//echo 'connected';
	
	$sql='SELECT * FROM product ORDER BY expiredDate DESC ';
	$qry=mysqli_query($con,$sql);
	return $qry;
	
}

?>