<head>
<title>Stock List</title>
</head>
<div class="topnav">
  <a class="active" href="itemList.php">Home</a>
  <a href="AddProductForm.php">Add</a>
  <a href="stockList.php">Stock</a>
 
</div>
<body>
<?php
include "stock.php";
//print_r($_POST);
//displaySearchPanel();
//kalau user search 

getListOfStock();  
	$itemQry=getListOfStock();
	
	if (isSet($_POST['searchById']))
	$itemQry = searchById($_POST['searchValue']);
	else if(isSet($_POST['ASC']))						//query for searching by brand
	$itemQry = ASC($_POST['getListOfItem']);
	else if(isSet($_POST['DESC']))						//query for searching by brand
	$itemQry = DESC($_POST['getListOfItem']);
	else
	$itemQry=getListOfStock();
	

echo '<h1>List of stock</h1>';
	echo '<form action="stockList.php" method="post">';
	echo '<fieldset><br><legend><br><br><p2>Search Item : </p2></legend>';
	echo '<input type="text" name ="searchValue"><br>';
	echo '<br><input type="submit" name ="searchById" value="By ID">';
	echo '<br> <input type="submit" name="ASC" value="Ascending"><br>';
    echo ' <input type="submit" name="DESC" value="Descending"><br><br>';
	echo '<input type="submit" name="displayAllButton" value="Display All">';
	echo '</fieldset>';
	echo '</form>';
	

$noOfItem = mysqli_num_rows($itemQry);
echo '<p2><br>There are  '.$noOfItem.' items records</p2>';

echo '<table id="customers">';
	echo '<tr >';
	echo '<tr>
			
			<th>ID</th>
			<th>Product Barcode</th>
			<th>items</th>
			<th>brand</th>
			<th>Stock in</th>
			

			<th>current stock</th>
		</tr>';
		
$bil=1;
while($row=mysqli_fetch_assoc($itemQry))
	{
		echo '<tr class=" w3-hover-text-blue"align=center>';
		echo '<tr>';
		//echo '<td>'.$bil.'</td>';
		echo '<br><td>'.$row['ID'].'</td>';
		echo '  <td>'.$row['product_barcode'].'</td>';
		echo '  <td>'.$row['items'].'</td>';
		echo '  <td>'.$row['brand'].'</td>';
		$date=date_create($row['stock_In']);
		$stock_In = date_format($date,"Y/m/d"); 	
		echo '  <td>'.$row['stock_In'].'</td>'; 
		echo '  <td>'.$row['stock'].'</td>';
		

		
		$bil++;
	}


echo '</table>';

?>
</body>

<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #039be5 ;
    color: white;
}
h1 {
    text-align: center;
    text-transform: uppercase;
	background: lightblue;
    color: #757575;
	font-family:Courier New ;
}

  p2 {
	font-family: Courier New;
	background: #F3F3F3;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #1de9b6;
  color: white;
}
input[type=submit]{
    background-color: #e8f5e9; /* Green */
    border: none;
    color: black;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
input[type=submit]:hover {
	background-color: #98F9A7;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
p2{
	font-family:Verdana;
}
body  {
    background-image: url("storewall.jpg");
    background-color: #cccccc;
}
</style>
