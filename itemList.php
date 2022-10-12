<head>
<title>main menu</title>
<link rel="icon" href="storeicon.png"> 
</head>
<body>
<div class="bg-img">
<div class="centered">Welcome to your inventory</div>
  <div class="container">
    <div class="topnav">
      <a href="itemList.php">Home</a>
      <a href="AddProductForm.php">Add</a>
      <a href="stockList.php">Stock</a>
	  <a href="report.php">Report</a>
    
    </div>
  </div>
</div>


<?php
include "product.php";

	$itemQry=getListOfItem();				//query for searching by Display all function */

if (isSet($_POST['searchByBarcode']))						//query for searching by barcode
	$itemQry = searchByBarcode($_POST['searchValue']);
	
else if(isSet($_POST['searchByItems']))						//query for searching by Item
	$itemQry = searchByItems($_POST['searchValue']);
	
else if(isSet($_POST['searchByStatus']))						//query for searching by Item
	$itemQry = searchByStatus($_POST['searchValue']);
	
else if(isSet($_POST['searchByBrand']))						//query for searching by brand
	$itemQry = searchByBrand($_POST['searchValue']);
	
else if(isSet($_POST['searchByDate']))						//query for searching by Date
	$itemQry = searchByDate($_POST['searchValue2']);
	
else if(isSet($_POST['searchByCategory']))						//query for searching by Date
	$itemQry = searchByCategory($_POST['searchValue']);

else if(isSet($_POST['ASC']))						//query for searching by brand
	$itemQry = ASC($_POST['getListOfItem']);
	
else if(isSet($_POST['DESC']))						//query for searching by brand
	$itemQry = DESC($_POST['getListOfItem']);

//searchBox();
displaySearchPanel();

$noOfItem = mysqli_num_rows($itemQry);						//query for calculate no of items in database

echo '<p2><br>There are  '.$noOfItem.' items records</p2>';			//Display number of items in database


echo '<table id="customers">';
	echo '<tr >';
	echo '<tr>
			<th>Bil</th>
			<th>Product barcode</th>
			<th>Items</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Category</th>
			<th>Lane</th>
			<th>Mode</th>
			<th>Shelf</th>
			<th>Expired Date</th>
		
			<th>Status</th> 
			<th>Stock</th>
			<th>Location</th>
			<th>Delete</th>
			<th>Update</th>
		
		</tr>';
		
$bil=1;
while($row=mysqli_fetch_assoc($itemQry))						//loop for inserting data into table from database in phpmyAdmin
	{
		/*=================================================
		$dateToCheck=$row['expiredDate'];
		$today=date();
		echo  $dateToCheck.'-==='.date('Y-m-d'); 
		====================================================*/
		
		echo '<tr class=" w3-hover-text-blue"align=center>';
		echo '<tr>';
		echo '<td>'.$bil.'</td>';
		echo '<br><td>'.$row['product_barcode'].'</td>';		//fetch data product_barcode from database

		echo '  <td>'.$row['items'].'</td>';					//fetch data items from database
		echo '  <td>'.$row['price'].'</td>';
		echo '  <td>'.$row['brand'].'</td>';					//fetch data brand from database
		echo '  <td>'.$row['category'].'</td>';
		echo '  <td>'.$row['lane'].'</td>';
		echo '  <td>'.$row['mode'].'</td>';
		echo '  <td>'.$row['shelf'].'</td>';
		//--------------------------------------------------------------------------------------------//fetch data expiredDate from database
		if($row['expiredDate']== date('Y-m-d'))
		{
				echo '  <td>'.$row['expiredDate'].'  <p3><b>Today</b></p3></td>';
		}
		elseif($row['expiredDate'] < date('Y-m-d'))
				echo '  <td>'.$row['expiredDate'].' <p1><b>Overdue</b></p1></td>';
		else
				echo '  <td>'.$row['expiredDate'].'</td>';
		//--------------------------------------------------------------------------------------------------------------------
		/* if($row['NumOfExpiredDays']== date('Y-m-d'))
		{
				echo '  <td>'.$row['NumOfExpiredDays'].'  <b>Today</b></td>';
		}
		else
				echo '  <td>'.$row['NumOfExpiredDays'].'---</td>'; */
		//====================================================================================================================
	
		echo '  <td>'.$row['status'].'</td>';
		echo '  <td>'.$row['stock'].'</td>';

		//------------------------------------------------
		//DELETE product 
		$barcode=$row['product_barcode'];
		$location=$row['lane'];  //8/9/18
		$locatioN=$row['mode'];  //29/9/18
		echo'<td>';
			echo '<form action ="location.php" method = "post">';
			echo "<input type='hidden' name='locateLane' value='$location'>";
			echo "<input type='hidden' name='locateMode' value='$locatioN'>";
			echo "<button class='btn' name='locateButton' value='Locate'>";
			echo '</form>';
		echo'</td>';
		//=============================================================
		echo'<td>';
			echo '<form action ="processProduct.php" method = "post">';
			echo "<input type='hidden' name='barcodeToDelete' value='$barcode'>";
			echo "<button class='btn' name='deleteButton' value='delete'><i class='fa fa-trash'></i></button>";
			echo '</form>';
		echo'</td>';
		//------------------------------------------------
		//UPDATE product 29/1/18
		echo'<td>';
			echo '<form action ="updateItemForm.php" method = "post">';
			echo "<input type='hidden' name='barcodeToUpdate' value='$barcode'>";
			echo "<button class='btn' name='updateButton' value='Update'><i class='fa fa-upload'></i></button>";
			echo '</form>';
		echo'</td>';
		//-------------------------------------------------


		//-------------------------------------------------
		echo '</tr>';
		
		$bil++;
	}

/* //-----------------------------------------------
	echo '<form action ="AddProductForm.php" method="post">';
	echo '<br><input type="Submit" name="addProductButton" value="Add Product">';
	echo '</form>';
	
	echo '<form action ="stockList.php" method="post">';
	echo '<br><input type="Submit" value="View Stock">';
	echo '</form>'; */
echo '</table>';
?>

<?php
function displaySearchPanel()										//Function for search box
{

	echo '<form action="itemList.php" method="post">';
	
	echo '<fieldset><legend><br><br><p2>Search Item:</p2></legend>';		//legend
	echo '<input type="text" name ="searchValue"><br>';						//display search box input
	echo '<input type="date" name ="searchValue2"><br>';
	
	echo '<br><input type="submit" name ="searchByBarcode" value="By Barcode" id="button1">';		//search by barcode button
	echo '<input type="submit" name="searchByItems" value="By Item" id="button2">';					//search by items button
	echo '<input type="submit" name="searchByBrand" value="By Brand" id="button3">';				//search by brand button
	echo '<input type="submit" name="searchByCategory" value="By Category">';
	echo '<input type="submit" name="searchByDate" value="By Expired Date"><br>';						//search by date button
	echo '<br><input type="submit" name="searchByStatus" value="By Status">';
	
	echo '<br> <input type="submit" name="ASC" value="Ascending"><br>';
    echo ' <input type="submit" name="DESC" value="Descending"><br><br>';
	
	echo '<br><input type="submit" name="displayAllButton" value="Display All">';					//display all button
	

	echo '</fieldset>';
	echo '</form>';
	
}


?>
</body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
p1{
	 color: red;
 }

 p3{
	 color: Blue;
 }
   
  p2 {
	font-family: Courier New;
	background: #F3F3F3;
}
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
    background-color: #40c4ff;
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
.btn {
    background-color: #e53935;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 70%;
    border-left: none;
    height: 300px;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.bg-img {
  /* The image used */
  background-image: url("anime.jpg");

  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
  /* Needed to position the navbar */
  position: relative;
  
}

/* Position the navbar container inside the image */
.container {
  position: absolute;
  margin: 20px;
  width: auto;
}

/* The navbar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Navbar links */
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
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 1px 1px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
input[type=date] {
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

input[type=date]:focus {
    width: 100%;
}
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
	background: #F3F3F3;
	text-transform: uppercase;
    color: #212121;
	font-family:Courier New ;
	font-size: 270%;
}	 
body  {
    background-image: url("storewall.jpg");
   
}
</style>
